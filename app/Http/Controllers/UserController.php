<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //   
    public function __construct(){
        $this->middleware('guest', ['only' => 'showLogin']);
    }

    public function showLogin(){
        return view('index');
    }

    public function login(Request $request)
    {
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese contraseña',
        ]);

        if (Auth::attempt($data))
        {
            $con='OK';
        }  

        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if ($query->count()!=0)
        {
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if (password_verify($password, $hashp))
            {
                return redirect('home');

                // return view('bienvenido');
            }
            else
            {
                return back()->withErrors(['password'=>'Contraseña no válida'])
                ->withInput(request(['name', 'password']));
            }
        }
        else
        {
            return back()->withErrors(['name'=>'Usuario no válido'])
            ->withInput(request(['name']));
        }
    }  

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
