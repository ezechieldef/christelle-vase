<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElicitationRequest extends FormRequest
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
			'CodeElicitation' => 'required|string',
			'CodeUICIndex' => 'string',
			'DateNaissance' => 'required',
			'Sexe' => 'required',
			'isTested' => 'required',
			'TestingCode' => 'string',
			'Result' => 'string',
        ];
    }
}
