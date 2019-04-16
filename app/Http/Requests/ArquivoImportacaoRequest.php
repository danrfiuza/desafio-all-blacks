<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArquivoImportacaoRequest extends FormRequest
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
            'arquivo' => 'required|mimes:xml'
        ];
    }

    public function messages()
    {
        return [
            'arquivo.required' => 'Informe o arquivo',
            'arquivo.mimes' => 'Extensão permitida: XML'
        ];
    }
}
