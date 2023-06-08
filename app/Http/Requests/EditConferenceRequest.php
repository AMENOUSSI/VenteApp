<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditConferenceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|string',
            'sigle' =>'required|string',
            'theme' =>'required|string',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(Response()->json([
            'success' => false,
            'error' => true,
            'message' => 'erreur de validation',
            'errorList' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'name.required' => 'Nom d\'utilisateur n\'est pas valide.',
            'sigle.string' => 'Le nom est obligatoire.',
            'theme.required' => 'Le theme est obligatoire.',
            
        ];
    }

}
