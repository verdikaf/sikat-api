<?php

namespace App\Http\Controllers;

use App\t_laporan_bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(){
        return t_laporan_bencana::query()->orderByDesc('id')->paginate(3);
    }

    public function showAll(){
        return t_laporan_bencana::all();
    }

    public function show($id){
        return t_laporan_bencana::find($id);
    }

    public function search(Request $request){

        $q = $request->input('q');
        // $laporan = DB::table('t_laporan_bencana')
        //             ->where('jenis_bencana', 'like', '%' . $q . '%')
        //             ->paginate(3);

        // $q = $request->input('q');
        return t_laporan_bencana::query()->where('jenis_bencana', 'like', '%' . $q . '%')->paginate(3);

        return Response::json($laporan);
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'jenis_bencana' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'jml_korban' => 'required',
            'jml_meninggal' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        return t_laporan_bencana::create($request->all());
    }

    public function update(Request $request, $id){
        $valid = Validator::make($request->all(), [
            'jenis_bencana' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'jml_korban' => 'required',
            'jml_meninggal' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }
        
        $laporan = t_laporan_bencana::findOrFail($id);
        $laporan->update($request->all());

        return $laporan;
    }
}
