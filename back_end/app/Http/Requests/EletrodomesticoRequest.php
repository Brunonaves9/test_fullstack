<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class EletrodomesticoRequest extends FormRequest
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
            'nome'      => 'required',
            'descricao' => 'required',
            'tensao'    => 'required',
            'marca_id'  => 'required'
        ];
    }

    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'status'     => false,
            'validate'   => true,
            'mensagem'   => 'Verifique os dados do formulário.',
            'dados'      => $validator->errors()

        ]));

    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do produto é obrigatório',
            'descricao.required' => 'Descrição é obrigatório',
            'tensao.required' => 'Tensão é obrigatório',
            'marca_id.required' => 'Marca do produto é obrigatório'
        ];
    }
    

}
