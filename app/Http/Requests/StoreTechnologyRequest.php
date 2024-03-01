<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:technologies',
            'badge_color' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome della tecnologia è obbligatorio',
            'name.max' => 'Il nome della tecnologia non può superare i 50 caratteri',
            'name.unique' => 'Esiste già una tecnologia con questo nome'
        ];
    }
}
