<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()   //  les regles de validation
    {
        return [
            // champs obligatoires|format|taille max ou min (table)|index table
            'email' => 'required|email',
            'password' => 'required',
            
        ];
    }
    
    
    /**
     * {@inheritDoc}
     * @see \Illuminate\Foundation\Http\FormRequest::messages()
     * message d'erreur traduit individuellement
     */
    public function messages()
    {
        
        return [
            'email.required' => 'Adresse :attribute obligatoire.',
            'email.email' => 'Adresse :attribute invalide.',
            'password.required' => 'Mot de passe obligatoire.',
        ];
        
        
    }
}