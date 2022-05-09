<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\PlanoSaude;

/**
 * Class PlanoSaudesRepository.
 */
class PlanoSaudesRepository
{

    protected $model;

    public function __construct(PlanoSaude $planoSaudes)
    {
        $this->model = $planoSaudes;
    }
      public function getMyPlanos()
    {
        return $this->model->get();
    }
    public function storeNovoPlano(array $data)
    {
        return $this->model->create($data);
    }
    public function getPlanoPorCodigo(string $identify)
    {
        return $this->model
                    ->where('plan_codig', $identify)
                    ->firstOrFail();
    }

    public function editarPlanoPorCodigo(string $identify, array $data)
    {
        $plano = $this->getPlanoPorCodigo($identify);

        return $plano->update($data);
    }

     public function deletePlanoPorCodigo(string $identify)
    {
        $plano = $this->getPlanoPorCodigo($identify);

        return $plano->delete();
    }
}
