<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ConsultaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       $particular = "Não";
       if($this->particular == 1){
            $particular = "Sim";
       }
       return [
            'Código' => $this->cons_codigo,
            'Médico' => $this->medico->med_nome,
            'Paciente' => $this->paciente->pac_nome,
            'Plano' => $this->vinculo->planoSaude->plano_descricao,
            'Nº Contrato' => $this->fk_nr_contrato,
            'Data' => $this->data,
            'Hora' => $this->hora,
            'Procedimento' => $this->procedimento->proc_nome,
            'Particular' => $particular,
        ];
    }
}
