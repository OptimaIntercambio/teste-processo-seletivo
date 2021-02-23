<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class StoreUpdatePais extends FormRequest
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
        $rules = [
            'nome' => [
                'required',
                'min:3',
                'max:255',
                ValidationRule::unique('paises')->ignore($this->id)
            ],
            'resumo' => ['nullable', 'max:380'],
            'descricao' => ['nullable'],

            'bandeira' => ['nullable', 'image'],
            'imagem' => ['nullable', 'image'],
            
            'populacao' => ['nullable','integer', 'min:0'],
            'pib' => ['nullable','numeric', 'min:0'],
            'idh' => ['nullable','numeric', 'min:0'],
        ];

        return $rules;
    }
}
