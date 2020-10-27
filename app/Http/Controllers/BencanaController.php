<?php

namespace App\Http\Controllers;

use App\t_bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class BencanaController extends Controller
{
    public function index(){
        return t_bencana::query()->paginate(3);
    }

    public function showAll(){
        return t_bencana::all();
    }

    public function show($id){
        return t_bencana::find($id);
    }

    public function search(Request $request){

        $q = $request->input('q');
        $bencana = DB::table('t_bencana')
                    ->where('nama_bencana', 'like', '%' . $q . '%')
                    ->paginate(3);

        return Response::json($bencana);
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'nama_bencana' => 'required',
            'lokasi' => 'required',
            'id_laporan_bencana' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        return t_bencana::create($request->all());
    }

    public function update(Request $request, $id){
        $valid = Validator::make($request->all(), [
            'nama_bencana' => 'required',
            'lokasi' => 'required',
            'id_laporan_bencana' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        $bencana = t_bencana::findOrFail($id);
        $bencana->update($request->all());

        return $bencana;
    }
}
