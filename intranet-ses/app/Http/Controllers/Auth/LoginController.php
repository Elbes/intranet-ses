<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function login()
    {
    	return view('auth.login');
    		
    }
    public function logout()
    {
    	Auth::logout();
    	
    	return Redirect::to('/');
    }
    public function getEntrar(Request $request)
    {
    	$email = $request->email;
    	//$senha = $request->senha;
    	$usuario = new \App\ta_usuarios;
    	$find = $usuario->where('email', $email)
    	->first();

    	if ($find) // se encontrou o usuário
    	{
    		//verifiando a senha texto enviado pelo form
    		//comparando com hash gravado no banco
    		if (\Hash::check( $request->senha, $find->senha))
    		{
    			//autorizando o login do usuário.
    			\Auth::login($find, true);
    			return Redirect::to('/admin');
    		}else {
    			Session::flash('error', 'Senha não confere!!!');
    			return Redirect::to('login');
    		}
    	}else{
    		Session::flash('error', 'Usuário não encontrado ou Inativo!!!');
    		return Redirect::to('login');
    	}
    }
}
