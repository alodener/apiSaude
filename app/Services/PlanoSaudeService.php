<?php

namespace App\Services;

use App\Repositories\PlanoSaudesRepository;

class PlanoSaudeService
{
    protected $repository;

    public function __construct(PlanoSaudesRepository $planoSaudeRepository)
    {
        $this->repository = $planoSaudeRepository;
    }

    public function getMyPlanosSaudes()
    {
        return $this->repository->getMyPlanos();
    }

    public function getPlanosSaudes(string $identify)
    {
        return $this->repository->getPlanoPorCodigo($identify);
    }

    public function storeNovoPlano(array $data)
    {
        return $this->repository->storeNovoPlano($data);
    }

    public function editarPlanoSaude(string $identify, array $data)
    {
        return $this->repository->editarPlanoPorCodigo($identify, $data);
    }

        public function deletePlano(string $identify)
    {
        return $this->repository->deletePlanoPorCodigo($identify);
    }
}
