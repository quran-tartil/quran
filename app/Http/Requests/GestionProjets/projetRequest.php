<?php
namespace App\Http\Requests\GestionProjets;

use Illuminate\Foundation\Http\FormRequest;

class projetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|max:40',
            'description' => 'nullable|max:255',
            'date_debut' => 'required|date',
            'date_de_fin' => 'required|after:date_debut',
        ];
    }


    public function messages(): array
    {
        return [
            'nom.required' => __('GestionProjets/projet/validation.nomRequired'),
            'nom.max' => __('GestionProjets/projet/validation.nomMax'),
            'description.max' => __('GestionProjets/projet/validation.descriptionMax'),
            'date_debut.required' => __('GestionProjets/projet/validation.dateDebutRequired'),
            'date_debut.date' => __('GestionProjets/projet/validation.dateDebutDate'),
            'date_de_fin.required' => __('GestionProjets/projet/validation.dateDeFinRequired'),
            'date_de_fin.after' => __('GestionProjets/projet/validation.dateDeFinAfter'),
        ];
    }
}