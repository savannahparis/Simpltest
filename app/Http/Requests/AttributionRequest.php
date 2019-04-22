<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributionRequest extends FormRequest
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
            'user' => 'required',
            'ordi' => 'required',
            'h_debut' => "required",
            'h_fin' => 'required|after:h_debut',
            
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
            'user.required' => 'Choisir un :attribute obligatoire.',
            'ordi.required' => 'Choisir un :attribute obligatoire.',
            'h_fin.after'   => "Tranche horaire non valide"
    
        ];
        
        
    }
}