<?php

namespace App\Services;

use App\Repositories\PacientesRepository;

class PacientesService
{
    protected $repository;

    public function __construct(PacientesRepository $pacientesRepository)
    {
        $this->repository = $pacientesRepository;
    }

    public function getMyPacientes()
    {
        return $this->repository->getMyPacientes();
    }

    public function getPaciente(string $identify)
    {
        return $this->repository->getPacientePorCodigo($identify);
    }

    public function storeNovoPaciente(array $data)
    {
        return $this->repository->storeNovoPaciente($data);
    }

    public function editarPaciente(string $identify, array $data)
    {
        return $this->repository->editarPacientePorCodigo($identify, $data);
    }

        public function deletePaciente(string $identify)
    {
        return $this->repository->deletePacientePorCodigo($identify);
    }
}
