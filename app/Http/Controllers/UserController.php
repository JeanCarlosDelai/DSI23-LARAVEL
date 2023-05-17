<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index() {
        return view('user.index');
    }
    public function create() {
        return view('user.create');
    }
    public function createSave(Request $data) {
        $data = $data->toArray();
        //Criptografa a senha
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Mail::raw('Este é um e-mail de teste', function($msg) {
            $msg->to('destinatario@hotmail.com')->subject('Usuário criado com sucesso');
        });

        return redirect()->route('user.index');
    }


    public function login(Request $data) {
        // Post
        if (request()->isMethod('POST')){
            $login = $data->validate([
                'name' => 'required',
                'password' => 'required',
            ]);
            if (Auth::attempt($login)){
                return redirect()->route('estoque');
            } else {
                return redirect()->route('user.login')->with('erro', 'Usuário ou senha Inválidos');
            }
        }
        //Se não for Post mostra o view
        return view('user.login');
    }
    public function logout() {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
