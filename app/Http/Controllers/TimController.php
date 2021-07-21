<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimController extends Controller
{
    public function index(){
        return t_tim::query()->orderByDesc('id')->paginate(3);
    }

    public function showAll(){
        return t_tim::all();
    }

    public function show($id){
        return t_tim::find($id);
    }

    public function search(Request $request){

        $q = $request->input('q');
        $supplier = DB::table('t_tim')
                    ->where('nama', 'like', '%' . $q . '%')
                    ->paginate(3);

        return Response::json($supplier);
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        return t_tim::create($request->all());
    }

    public function update(Request $request, $id){
        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }
        
        $supplier = t_tim::findOrFail($id);
        $supplier->update($request->all());

        return $supplier;
    }
}
