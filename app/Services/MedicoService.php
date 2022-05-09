<?php

namespace App\Services;

use App\Repositories\MedicoRepository;

class MedicoService
{
    protected $repository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->repository = $medicoRepository;
    }

    public function getMyMedico()
    {
        return $this->repository->getMyMedico();
    }

    public function getMedico(string $identify)
    {
        return $this->repository->getMedicoPorCodigo($identify);
    }

    public function storeNovoMedico(array $data)
    {
        return $this->repository->storeNovoMedico($data);
    }

    public function editarMedico(string $identify, array $data)
    {
        return $this->repository->editarMedicoPorCodigo($identify, $data);
    }

        public function deleteMedico(string $identify)
    {
        return $this->repository->deleteMedicoPorCodigo($identify);
    }
}
