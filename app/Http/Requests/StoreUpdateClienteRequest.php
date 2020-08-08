<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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

     //Exemplo de email mínimo: a@a.com
     //Exemplo telefone mínimo: 87654321
     //Exemplo telefone máximo: +55 (84) 98845-6625
    public function rules()
    {
        return [
            'nome' => 'required|min:3|max:255',
            'email' => 'required|min:7|max:255',
            'telefone' => 'required|min:8|max:19',
            'endereco' => 'required|min:3|max:255',
        ];
    }
}
