<?php

namespace App\Domains\Searches\Request;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'name' => 'string|nullable|max:190',
            'cpf' => 'numeric|nullable|cpf|required_without:name'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Digite um nome válido',
            'cpf.numeric' => 'O campo CPF deve ser somente números',
            'cpf.cpf' => 'Digite um CPF válido',
            'cpf.required_without' => 'O campo CPF é obrigatório caso não informe o nome.',
        ];
    }
}
