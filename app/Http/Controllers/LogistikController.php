<?php

namespace App\Http\Controllers;

use App\t_logistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class LogistikController extends Controller
{
    public function index(){
        $logistik=DB::table('t_logistik')
        ->join('t_kategori_logistik','t_logistik.id_kategori','=','t_kategori_logistik.id')
        ->join('t_supplier','t_logistik.id_supplier','=','t_supplier.id')
        ->select('t_logistik.id_logistik', 't_logistik.nama_barang', 't_logistik.stok', 't_logistik.status', 't_logistik.expired', 't_logistik.id_kategori', 't_kategori_logistik.jenis_kategori','t_logistik.id_supplier', 't_supplier.nama')
        ->orderByDesc('id_logistik')
        ->paginate(3);
        
        return Response::json($logistik);
    }

    public function showAll(){
        $logistik=DB::table('t_logistik')
        ->join('t_kategori_logistik','t_logistik.id_kategori','=','t_kategori_logistik.id')
        ->join('t_supplier','t_logistik.id_supplier','=','t_supplier.id')
        ->select('t_logistik.id_logistik', 't_logistik.nama_barang', 't_logistik.stok', 't_logistik.status', 't_logistik.expired', 't_logistik.id_kategori', 't_kategori_logistik.jenis_kategori','t_logistik.id_supplier', 't_supplier.nama');
        
        return Response::json($logistik);
    }

    public function show($id){
        $logistik=DB::table('t_logistik')
        ->join('t_kategori_logistik','t_logistik.id_kategori','=','t_kategori_logistik.id')
        ->join('t_supplier','t_logistik.id_supplier','=','t_supplier.id')
        ->select('t_logistik.id_logistik', 't_logistik.nama_barang', 't_logistik.stok', 't_logistik.status', 't_logistik.expired', 't_logistik.id_kategori', 't_kategori_logistik.jenis_kategori','t_logistik.id_supplier', 't_supplier.nama')
        ->where('t_logistik.id_logistik', '=', $id)
        ->get();
        
        return Response::json($logistik);
    }

    public function search(Request $request){

        $q = $request->input('q');
        $logistik = DB::table('t_logistik')
                    ->where('nama_barang', 'like', '%' . $q . '%')
                    ->paginate(3);

        return Response::json($logistik);
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'id_kategori' => 'required|numeric',
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'id_supplier' => 'required|numeric',
            'status' => 'required',
            'expired' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }
        
        $logistik=DB::table('t_logistik')->insert([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'id_supplier' => $request->id_supplier,
            'status' => $request->status,
            'expired' => $request->expired
        ]);

        return Response::json($logistik);
    }

    public function update(Request $request, $id){

        $logistik=DB::table('t_logistik')
        ->where('id_logistik', $id)
        ->update([
            'id_kategori' => $request->id_kategori,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'id_supplier' => $request->id_supplier,
            'status' => $request->status,
            'expired' => $request->expired
        ]);

        return Response::json($logistik);
    }
}
