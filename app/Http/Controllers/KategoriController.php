<?php

namespace App\Http\Controllers;

use App\t_kategori_logistik;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        return t_kategori_logistik::all();
    }

    public function show($id){
        return t_kategori_logistik::find($id);
    }

    public function store(Request $request){
        return t_kategori_logistik::create($request->all());
    }

    public function update(Request $request, $id){
        $kategori = t_kategori_logistik::findOrFail($id);
        $kategori->update($request->all());

        return $kategori;
    }
}
