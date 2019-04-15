<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ClienteRequest extends FormRequest
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
        $this->sanitize();

        $cliente_id = Request::get('cliente_id');
        return [
            'cliente_id' => '',
            'endereco_id' => '',
            'nome' => 'required',
            'email' => 'required|unique:clientes,email' . ($cliente_id ? ",$cliente_id,id" : ''),
            'documento' => 'required|unique:clientes,documento' . ($cliente_id ? ",$cliente_id,id" : ''),
            'telefone' => '',
            'uf' => '',
            'cidade' => '',
            'cep' => '',
            'endereco' => '',
            'bairro' => ''
        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $input['documento'] = str_replace(['.', '-'], ['', ''], $input['documento']);
        $this->replace($input);
    }

    public function messages()
    {
        return [
            'nome.required' => 'Campo Nome é obrigatório.',
            'email.required' => 'Campo E-mail é obrigatório.',
            'email.unique' => 'E-mail já cadastrado.',
            'documento.required' => 'Campo Documento é obrigatório.',
            'documento.unique' => 'Já existe cliente cadastrado com este documento.',
        ];
    }
}
