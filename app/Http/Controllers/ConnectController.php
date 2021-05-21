<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\Models\User;

class ConnectController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }
    public function getLogin(){
        return view('connect.login');
    }
    public function getRegister(){
        return view('connect.register');
    }
    public function postRegister(Request $request){
        $rules = [
            'name' => 'required',
            'lastn' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password'
        ];

        $messages = [
            'name.required' => 'Introduzca su nombre.',
            'lastn.required' => 'Introduzca sus apellidos.',
            'email.required' => 'Introduzca un correo electrónico.',
            'email.email' => 'Introduzca un correo valido.',
            'email.unique' => 'Este usuario ya existe.' ,
            'password.required' => 'Introduzca una contraseña.',
            'password.min' => 'La contraseña debe tener 8 caracteres.',
            'cpassword.required' => 'Confirme su contraseña.',
            'cpassword.same' => 'Las contraseñas no coinciden.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastn'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            if($user->save()):
                return redirect('/login')->with('message','Te has registrado exitosamente')->with('typealert','success');
            endif;
        endif;
    }

    public function postLogin(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Introduzca un correo electrónico.',
            'email.email' => 'Introduzca un correo valido.',
            'password.required' => 'Introduzca una contraseña.',
            'password.min' => 'La contraseña debe tener 8 caracteres.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert',
            'danger');
        else:
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],true)):
                return redirect('/');
            else:
                return back()->with('message','Correo electrónico o contraseña erronea')->with('typealert',
                'danger');
            endif;
        endif;
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
