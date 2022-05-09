<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Código' => $this->med_codigo,
            'Médico' => $this->med_nome,
            'CRM' => $this->med_CRM,
            'Especialidade' => $this->especialidade->espec_nome,
        ];
    }
}
