<?php
namespace App\Http\Requests\Quran;

use Illuminate\Foundation\Http\FormRequest;

class SurahRequest extends FormRequest
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
            'nom.required' => __('Quran/Surah/validation.nomRequired'),
            'nom.max' => __('Quran/Surah/validation.nomMax'),
            'description.max' => __('Quran/Surah/validation.descriptionMax'),
            'date_debut.required' => __('Quran/Surah/validation.dateDebutRequired'),
            'date_debut.date' => __('Quran/Surah/validation.dateDebutDate'),
            'date_de_fin.required' => __('Quran/Surah/validation.dateDeFinRequired'),
            'date_de_fin.after' => __('Quran/Surah/validation.dateDeFinAfter'),
        ];
    }
}