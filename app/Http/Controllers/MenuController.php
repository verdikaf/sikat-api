<?php

namespace App\Http\Controllers;

use App\t_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class MenuController extends Controller
{
    public function index(){
        $menu=DB::table('t_menu')
        ->join('t_role','t_menu.id_role','=','t_role.id')
        ->select('t_menu.*', 't_role.nama_role')
        ->get();
        
        return Response::json($menu);
    }

    public function show($id){
        $menu=DB::table('t_menu')
        ->join('t_role','t_menu.id_role','=','t_role.id')
        ->select('t_menu.*', 't_role.nama_role')
        ->where('t_menu.id', '=', $id)
        ->get();
        
        return Response::json($menu);
    }

    public function store(Request $request){
        $menu=DB::table('t_menu')->insert([
            'nama_menu' => $request->nama_menu,
            'url' => $request->url
        ]);

        return Response::json($menu);
    }

    public function update(Request $request, $id){
        $menu=DB::table('t_menu')
        ->where('id', $id)
        ->update([
            'nama_menu' => $request->nama_menu,
            'url' => $request->url
        ]);

        return Response::json($menu);
    }
}
