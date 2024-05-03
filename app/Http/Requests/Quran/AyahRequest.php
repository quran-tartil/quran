<?php
namespace App\Http\Requests\Quran;

use Illuminate\Foundation\Http\FormRequest;

class AyahRequest extends FormRequest
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
            'nom.required' => __('Quran/Ayah/validation.nomRequired'),
            'nom.max' => __('Quran/Ayah/validation.nomMax'),
            'description.max' => __('Quran/Ayah/validation.descriptionMax'),
            'date_debut.required' => __('Quran/Ayah/validation.dateDebutRequired'),
            'date_debut.date' => __('Quran/Ayah/validation.dateDebutDate'),
            'date_de_fin.required' => __('Quran/Ayah/validation.dateDeFinRequired'),
            'date_de_fin.after' => __('Quran/Ayah/validation.dateDeFinAfter'),
        ];
    }
}