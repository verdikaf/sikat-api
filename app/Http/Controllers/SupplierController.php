<?php

namespace App\Http\Controllers;

use App\t_supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

class SupplierController extends Controller
{
    public function index(){
        return t_supplier::query()->orderByDesc('id')->paginate(3);
    }

    public function showAll(){
        return t_supplier::all();
    }

    public function show($id){
        return t_supplier::find($id);
    }

    public function search(Request $request){

        $q = $request->input('q');
        $supplier = DB::table('t_supplier')
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

        return t_supplier::create($request->all());
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
        
        $supplier = t_supplier::findOrFail($id);
        $supplier->update($request->all());

        return $supplier;
    }
}