<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypePopulationRequest extends FormRequest
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

        $typePopulation = $this->route('type_population') ? $this->route('type_population')->TypePopulation : null;
        return [
            'TypePopulation' => 'required|string|max:255|unique:type_populations,TypePopulation,' . $typePopulation . ',TypePopulation',
            'Description' => 'required|string|max:255',
        ];
    }
}
