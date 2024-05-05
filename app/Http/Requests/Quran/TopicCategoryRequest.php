<?php
namespace App\Http\Requests\Quran;

use Illuminate\Foundation\Http\FormRequest;

class TopicCategoryRequest extends FormRequest
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
            'name' => 'required|max:40',
            'description' => 'nullable|max:255'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => __('Quran/TopicCategory/validation.nomRequired'),
            'nom.max' => __('Quran/TopicCategory/validation.nomMax'),
            'description.max' => __('Quran/TopicCategory/validation.descriptionMax'),
        ];
    }
}