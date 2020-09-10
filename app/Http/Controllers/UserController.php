<?php

namespace App\Http\Controllers;

use App\t_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

class UserController extends Controller
{
    public function index(){
        $user=DB::table('t_user')
        ->join('t_role','t_user.id_role','=','t_role.id')
        ->select('t_user.*', 't_role.nama_role')
        ->paginate(3);
        
        return Response::json($user);
    }

    public function show($id){
        $user=DB::table('t_user')
        ->join('t_role','t_user.id_role','=','t_role.id')
        ->select('t_user.*', 't_role.nama_role')
        ->where('t_user.id', '=', $id)
        ->get();
        
        return Response::json($user);
    }

    public function search(Request $request){

        $q = $request->input('q');
        $user = DB::table('t_user')
                    ->where('nama', 'like', '%' . $q . '%')
                    ->paginate(3);

        return Response::json($user);
    }

    public function store(Request $request){
        $user=DB::table('t_user')->insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => $request->password,
            'foto' => $request->foto,
            'id_role' => $request->id_role
        ]);

        return Response::json($user);
    }

    public function update(Request $request, $id){
        $user=DB::table('t_user')
        ->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => $request->password,
            'foto' => $request->foto,
            'id_role' => $request->id_role
        ]);

        return Response::json($user);
    }
}