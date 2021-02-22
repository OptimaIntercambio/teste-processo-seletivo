<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class StoreUpdateIdioma extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => [
                'required',
                'min:3',
                'max:255',
                ValidationRule::unique('idiomas')->ignore($this->id)
            ],
            'num_falantes' => ['nullable','integer', 'min:0'],
        ];
    }
}
