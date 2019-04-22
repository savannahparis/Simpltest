<?php
namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;



class RegisterRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // toujours indiquer vrai
    }
    
    
    
    public function rules()   //  les regles de validation
    {
        return [
            // champs obligatoires|format|taille max ou min (table)|index table
            'login' => 'required|min:4',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6',
            'passwordb' => 'required|same:password',
            
        ];
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Illuminate\Foundation\Http\FormRequest::messages()
     */
    public function messages() 
    {
        
        return [
            'login.required' => 'Le :attribute obligatoire.',
            'login.min' => 'Le :attribute minimum :min caractères.',
            'email.required' => 'Adresse :attribute obligatoire.',
            'email.email' => 'Adresse :attribute invalide.',
            'password.required' => 'Mot de passe obligatoire.',
            'password.min' => 'Mot de passe minimum :min caractères.',
            'passwordb.required' => 'Saisie obligatoire du mot de passe.',
            'passwordb.same' => 'N\'est pas identique au mot de passe saisie.' ,
        ];
        
        
    }
    
}