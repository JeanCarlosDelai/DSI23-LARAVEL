<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        User::create($data);

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
