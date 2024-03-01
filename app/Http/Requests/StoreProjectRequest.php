<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|max:50|unique:projects',
            'type_id' => 'nullable|exists:types,id',
            'cover_image' => 'nullable|image|max:2048',
            'description' => 'required',
            'link' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo del progetto è obbligatorio',
            'title.max' => 'Il titolo del progetto deve essere lungo al massimo 50 caratteri',
            'title.unique' => 'E\' già presente un progetto con questo titolo, scegline uno diverso',
            'type_id.exists' => 'Scegli un tipo di progetto tra quelli disponbili',
            'cover_image.image' => 'Il file selezionato deve essere un\'immagine',
            'cover_image.max' => 'Il file selezionato non deve superare i 2 mb',
            'description.required' => 'La descrizione del progetto è obbligatoria',
            'link.required' => 'Il link del progetto è obbligatorio',
            'link.max' => 'Il link del progetto deve essere lungo al massimo 150 caratteri'
        ];
    }
}
