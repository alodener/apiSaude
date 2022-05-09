<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsulta extends FormRequest
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
            'data' => 'required|date_format:Y-m-d',
            'hora' => 'required|date_format:H:i',
            'fk_med_codigo' => 'required',
            'fk_proc_codigo' => 'required',
            'fk_pac_codigo' => 'required',
            'fk_nr_contrato' => 'required',
            'particular' => 'required|int:1',
        ];
    }
}
