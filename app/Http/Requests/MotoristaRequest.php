<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotoristaRequest extends FormRequest
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
            'telefone' => 'required|string|min:9',
            'nascimento' => 'required|date',
            'user_id' => 'required|integer',
            'empresa_transportes_id' => 'required|integer',
        ];
    }
}
