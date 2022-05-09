<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Vinculo;
use App\Models\Paciente;
use App\Models\PlanoSaude;

/**
 * Class VinculoRepository.
 */
class VinculoRepository
{

    protected $model;

    public function __construct(Vinculo $vinculo)
    {
        $this->model = $vinculo;
    }
      public function getMyVinculos()
    {
        return $this->model->get();
    }
    public function storeNovoVinculo(array $data)
    {
        $paciente = Paciente::where('pac_codigo', $data['fk_pac_codigo'])->get();
        $plano = PlanoSaude::where('plan_codig', $data['fk_plan_codig'])->get();        
        
        if($paciente->isEmpty() || $plano->isEmpty()){
            return false;
        }

        return $this->model->create($data);
    }
    public function getVinculoPorCodigo(string $identify)
    {
        return $this->model
                    ->where('nr_contrato', $identify)
                    ->firstOrFail();
    }


     public function deleteVinculoPorCodigo(string $identify)
    {
        $vinculo = $this->getVinculoPorCodigo($identify);

        return $vinculo->delete();
    }
}
