<?php

namespace App\Http\Controllers;

use App\t_supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

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

    public function cari(Request $request){

        $cari = $request->cari;
        $supplier = t_supplier::where('nama', 'like', "%".$cari."%")->paginate(3);

        return Response()->json(['supplier' => $supplier], 200);
    }

    public function store(Request $request){
        return t_supplier::create($request->all());
    }

    public function update(Request $request, $id){
        $supplier = t_supplier::findOrFail($id);
        $supplier->update($request->all());

        return $supplier;
    }
}
