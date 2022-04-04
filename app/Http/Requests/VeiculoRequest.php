<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'cor' => 'required|string',
            'placa' => 'required|string',
            'ultima_revisao' => 'required|string',
            'ano' => 'required|string',
            'capacidade' => 'required|string',
            'empresa_transportes_id' => 'required|string',
        ];
    }
}
