<?php

namespace App\Http\Controllers;

use App\t_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        return t_role::all();
    }

    public function show($id){
        return t_role::find($id);
    }

    public function store(Request $request){
        return t_role::create($request->all());
    }

    public function update(Request $request, $id){
        $role = t_role::findOrFail($id);
        $role->update($request->all());

        return $role;
    }
}
