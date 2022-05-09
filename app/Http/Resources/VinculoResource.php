<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VinculoResource extends JsonResource
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
            'Numero do contrato' => $this->nr_contrato,
            'Nome do Paciente' => $this->paciente->pac_nome,
            'Plano de Saude' => $this->planoSaude->plano_descricao,
        ];
    }
}
