<?php

namespace App\Http\Controllers;

use App\t_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Validator;

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
        $valid = Validator::make($request->all(), [
            'id' => 'required|numeric|digits_between:8,16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_role' => 'required|numeric'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        $imageName = time().'_'.$request->foto->getClientOriginalName();
        $request->foto->move(public_path('/assets/images/profile'), $imageName);

        $user=DB::table('t_user')->insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'password' => $request->password,
            'foto' => $imageName,
            'id_role' => $request->id_role
        ]);

        return Response::json($user);
    }

    public function update(Request $request, $id){
        $user = t_user::find($id);

        $valid = Validator::make($request->all(), [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required',
            'id_role' => 'required|numeric'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        if($request->foto != ''){
            $validImage = Validator::make($request->foto, [
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
    
            if($validImage->fails()){
                return response()->json(
                    ['error'=>$validImage->errors()],
                    403
                );
            }

            $path = public_path().'/assets/images/profile';
  
            //code for remove old file
            if($user->foto != ''  && $user->foto != null){
                 $file_old = $path.$user->foto;
                 unlink($file_old);
            }
  
            //upload new file
            $imageName = time().'_'.$request->foto->getClientOriginalName();
            $request->foto->move($path, $imageName);
  
            //for update in table
            $user->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'password' => $request->password,
                'foto' => $imageName,
                'id_role' => $request->id_role
            ]);
        } else {
            $user->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'password' => $request->password,
                'id_role' => $request->id_role
            ]);
        }

        return $user;
    }

    public function login(Request $request){
        $valid = Validator::make($request->all(), [
            'id' => 'required|numeric|digits_between:8,16',
            'password' => 'required'
        ]);

        if($valid->fails()){
            return response()->json(
                ['error'=>$valid->errors()],
                403
            );
        }

        $user=DB::table('t_user')
        ->join('t_role','t_user.id_role','=','t_role.id')
        ->select('t_user.*', 't_role.nama_role')
        ->where(
            ['t_user.id' => $request->id, 't_user.password' => $request->password]
            )
        ->get();
        
        return Response::json($user);
    }
}