<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return t_contact::all();
    }

    public function show($id){
        return t_contact::find($id);
    }

    public function store(Request $request){
        return t_contact::create($request->all());
    }

    public function update(Request $request, $id){
        $contact = t_contact::findOrFail($id);
        $contact->update($request->all());

        return $contact;
    }
}
