<?php

namespace App\Http\Requests\GestionProjets;

use Illuminate\Foundation\Http\FormRequest;

class taskRequest extends FormRequest
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
            'project_id' => 'required|not_in:null',
            'user_id' => 'required|not_in:null',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => __('GestionProjets/task/validation.nomRequired'),
            'nom.max' => __('GestionProjets/task/validation.nomMax'),
            'description.max' => __('GestionProjets/task/validation.descriptionMax'),
            'date_debut.required' => __('GestionProjets/task/validation.dateDebutRequired'),
            'date_debut.date' => __('GestionProjets/task/validation.dateDebutDate'),
            'date_de_fin.required' => __('GestionProjets/task/validation.dateDeFinRequired'),
            'date_de_fin.after' => __('GestionProjets/task/validation.dateDeFinAfter'),
            'project_id.required' => __('GestionProjets/task/validation.projectRequired'),
            'project_id.not_in' => __('GestionProjets/task/validation.projectNotIn'),
            'user_id.required' => __('GestionProjets/task/validation.userRequired'),
            'user_id.not_in' => __('GestionProjets/task/validation.userNotIn'),
        ];
    }
}