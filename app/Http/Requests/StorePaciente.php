<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaciente extends FormRequest
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
            'pac_nome' => 'required|string|between:2,255',
            'pac_dataNascimento' => 'required|date_format:Y-m-d',
            'pac_telefones' => 'required',
        ];
    }
}
