<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfessionnelRequest extends FormRequest
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
            'prenom' => ['required', 'string', 'max:25'],
            'nom' => ['required', 'string', 'max:40'],
            'cp' => ['required', 'string', 'between:5,5'],
            'ville' => ['required', 'string', 'max:38'],
            'telephone' => ['required', 'string', 'max:14'],
//                $this->method() == 'POST' ?
//                ['required', 'string', 'max:14', 'unique:professionnels,telephone'] :
//                ['required', 'string', 'max:14', Rule::unique('professionnels', 'telephone')->ignore($this->professionnel)],
            'email' => ['required', 'email:rfc,dns'],
            'naissance' => ['required', 'date_format:Y-m-d'],
            'domaine' => ['required'],
            'metier_id' => ['required'],
        ];
    }
}
