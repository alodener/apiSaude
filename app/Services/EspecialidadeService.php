<?php

namespace App\Services;

use App\Repositories\EspecialidadeRepository;

class EspecialidadeService
{
    protected $repository;

    public function __construct(EspecialidadeRepository $especialidadeRepository)
    {
        $this->repository = $especialidadeRepository;
    }

    public function getMyEspecialidade()
    {
        return $this->repository->getMyEspecialidade();
    }

    public function getEspecialidade(string $identify)
    {
        return $this->repository->getEspecialidadePorCodigo($identify);
    }

    public function storeNovoEspecialidade(array $data)
    {
        return $this->repository->storeNovoEspecialidade($data);
    }

    public function editarEspecialidade(string $identify, array $data)
    {
        return $this->repository->editarEspecialidadePorCodigo($identify, $data);
    }

        public function deleteEspecialidade(string $identify)
    {
        return $this->repository->deleteEspecialidadePorCodigo($identify);
    }
}
