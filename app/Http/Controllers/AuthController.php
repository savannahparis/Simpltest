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
    
    
    
    /**
     * affiche le formulaire ou renvoi les messages erreurs.
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getRegister()
    {
        
        return view('layouts.auth.inscription', ['message' => '']);
    }
    
    /**
     * validation du formulaire via service RegisterRequest
     */
    public function postRegister(RegisterRequest $request)
    {
        //dd($request);  
        
        $user = new User();
        $user->login = $request->login;
        $user->email = $request->email;
        
        if($request->password === $request->passwordb):
            $user->password = hash_hmac('md5', $request->passwordb, $this->_mySel);
        endif;
        
        $user->profil = $request->profil;

        //dd($user);
        $user->save();

        // redirection
        $message = 'Un nouveau compte vient d\être ajouté !!';
        return redirect()->route('accueil')->with('message', $message);
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
                //return view('layouts.gestion.index', ['user' => $user]);
            } else {
                // error message
                return view('layouts.home.index', ['message' => ''])->withErrors('Je crois que vous n\'avez pas le droit d\'être là....');
            }

        } else {
            // error message
            return view('layouts.home.index', ['message' => ''])->withErrors('Erreur dans votre login ou mot de passe');
        }

        //return redirect()->route('home');
        
       
    }
}
