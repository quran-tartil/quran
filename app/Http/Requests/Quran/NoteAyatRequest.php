<?php
namespace App\Http\Requests\Quran;

use Illuminate\Foundation\Http\FormRequest;

class NoteAyatRequest extends FormRequest
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
            'note' => 'required|max:40',
            'topic_id' => 'required|not_in:null',
            'ayah_id' => 'required|not_in:null',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => __('Quran/NoteAyat/validation.nomRequired'),
            'nom.max' => __('Quran/NoteAyat/validation.nomMax'),
            'description.max' => __('Quran/NoteAyat/validation.descriptionMax'),
        ];
    }
}