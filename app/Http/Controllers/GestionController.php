<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Ordinateur;
use App\Http\Requests\AttributionRequest;
use App\Ordinateur_user;
use App\Attribution;
use App\Ordinateur_attribution;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;





class GestionController extends Controller
{
    //
    private $_mySel = '2019.pimspcent';
    
    
    public function index()
    {
      
        // info user
        $user = Auth::user();
        
        return view('layouts.gestion.index', ['user' => $user, 'message' => '']);
        
        
    }
    
    
    public function add_user()
    {
        $user = Auth::user();
        
        if (Auth::check()) {
            // The user is logged in...
            
            return view('layouts.gestion.add_user', ['user' => $user]);
        }
    }
    
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
        return redirect()->route('dashboard')->with('message', $message);
    }
    
    public function listAttrib()
    {
        $user = Auth::user();
        
        if (Auth::check()) {
            // The user is logged in...
            
            // liste complete attributions
            //$attributions = Attribution::all();
            
            $attributions = DB::table('attributions')
            ->join('ordinateurs_users', 'ordinateurs_users.id', '=', 'attributions.ordinateur_user_id')
            ->join('ordinateurs', 'ordinateurs.id', '=', 'ordinateurs_users.ordinateur_id')
            ->join('users', 'users.id', '=', 'ordinateurs_users.user_id')
            ->select('users.login', 'users.email', 'ordinateurs.nom', 'attributions.date', 'attributions.h_debut', 'attributions.h_fin', 'attributions.id')
            ->orderBy('attributions.h_debut', 'asc')
            ->get();
            
            //dd($reservations);
            return view('layouts.gestion.attributions', ['user' => $user, 'attributions' => $attributions]);
        }
    }
    
    public function addAttrib()
    {
        $user = Auth::user();
        
        
        if (Auth::check()) {
            // The user is logged in...
            
            // liste users - ordinateurs
            $u = User::where('profil', '=', 'user')->get();
            $o = Ordinateur::all('id', 'nom');
            $h = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'];
            
            
            return view('layouts.gestion.add_attribution', ['user' => $user, 'users' => $u, 'ordi' => $o, 'horaire' => $h]);
        }
        
        
    }
    
    public function postAttrib(AttributionRequest $request)
    {
        $user = Auth::user();
        
        if (Auth::check()) {
            // The user is logged in...

            $response = $this->verif_dispo($request->ordi, $request->user);  // false
  
            if($response !== 0)
            {
                $message = "Impossible de faire cette attribution, l'ordinateur ou l'utilsateur est déjà attribué, merci d'en choisir un autre";
                return redirect()->route('ajouter_attrib')->with('message', $message);
            }

            
            // ordinateur_user
            $attribuer = new Ordinateur_user();
            $attribuer->ordinateur_id = $request->ordi;
            $attribuer->user_id = $request->user;

            //dd($attribuer);
            
            $attribuer->save();
            
            //last_id ordinateur_user
            $id = $attribuer->id;
            
            // attribution
            $attrib = new Attribution();
            $attrib->ordinateur_user_id = $id;
            $attrib->date = $request->date;
            $attrib->h_debut = $request->h_debut;
            $attrib->h_fin = $request->h_fin;
            $attrib->save();

            
            // redirection
            $message = 'Attribution ajouté avec success!!';
            return redirect()->route('liste')->with('message', $message);
        }
        
        
    }
    
    public function delete($id)
    {
        $user = Auth::user();
        
        if (Auth::check()) {
            // The user is logged in...
            
            $confirm = Attribution::where('id', $id)->delete();
            
            if($confirm === 1)
            {
                $message = 'La suppression de l\'attribution n° '.$id.' est réalisée!!!';

                // redirection
                return redirect()->route('liste')->with('message', $message);
            }

        }

    }
    
    /**
     * @param int $ordinateur_id
     * @param int $user_id
     * @return number
     */
    public function verif_dispo(int $ordinateur_id, int $user_id)
    {
        // 
        $user = Auth::user();
        
        if (Auth::check())
        {

            try {
                $info = Ordinateur_user::where('ordinateur_id', $ordinateur_id)->firstOrFail();
                $r = $info->count();
                return $r;
                
            } catch (ModelNotFoundException $excO){
                
                // verification user
                try {
                    $info = Ordinateur_user::where('user_id', $user_id)->firstOrFail();
                    $r = $info->count();
                    return $r;
                    
                }catch (ModelNotFoundException $excU){
                    $r = 0;
                    return $r;
                }

            }

        }
        
        
    }
    
    
    
    public function logout()
    {
        if( Auth::check() )
            Auth::logout();

            return redirect()->route('home');
    }
    
    
   
}
