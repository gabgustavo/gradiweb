<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
  public function frmLogin()
  {
    return view('themes.adminlte.login');
  }

  public function login(LoginRequest $request)
  {
    if (filter_var($request->input('user'), FILTER_VALIDATE_EMAIL)) {
      $user = "email";
    } else { $user = "user"; }

    $data =[
      $user => $request->input('user'),
      'password' => $request->input('password'),
      'estado'=>'activo'
    ];

    $recordar = $request->input('remember');

    if (Auth::attempt($data, $recordar)) {
      return redirect()->route('dashboard');

      //redireccionar al dasboard
    } else {
      $msg = "Usuario o contraseña no valido";
      return redirect()->route('frmlogin')->withInput()->withErrors(['login'=>$msg]);
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('frmlogin');
  }
}
