<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    private $_mySel = '2019.pimspcent';
    
    
    
    
    
    
    // connexion
    public function index()
    {
        
        return view('layouts.auth.index', ['message' => '']);
    }
    
    
    public function postLogin(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        //dd($user);
        
        if($user->password === hash_hmac('md5', $request->password, $this->_mySel))
        {
            //dd($user);
            
            if($user->profil === 'gestionnaire' || $user->profil === 'admin')
            {
                // connexion automatiquement
                Auth::login($user, true);
                
                return redirect()->route('dashboard')->with('user', $user);

            } else {
                // error message
                return view('layouts.home.index', ['message' => ''])->withErrors('Je crois que vous n\'avez pas le droit d\'être là....');
            }

        } else {
            // error message
            return view('layouts.home.index', ['message' => ''])->withErrors('Erreur dans votre login ou mot de passe');
        }

       
    }
}
