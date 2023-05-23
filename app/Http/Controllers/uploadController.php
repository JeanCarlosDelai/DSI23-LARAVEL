<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }
    public function save(Request $form)
    {
        $arquivo = $form->file('file');

        //Grava com o nome aleatório
        // $arquivo->store('public');

        //Grava com o nome original
        $arquivo->storeAs('public', $arquivo->getClientOriginalName());

        return ('Gravado');
    }
}
