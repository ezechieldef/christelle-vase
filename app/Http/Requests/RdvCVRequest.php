<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RdvCVRequest extends FormRequest
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
			'CodeUIC' => 'required|string',
			'TypePopulation' => 'required|string',
			'Sexe' => 'required|string',
			'DateNaissance' => 'required',
			'DateRDV' => 'required',
			'DatePrelevement' => 'required',
			'NombreCopie' => 'required',
			'ResultatCV' => 'required|string',
        ];
    }
}
