<?php

namespace App\Services;

use App\Repositories\ConsultaRepository;

class ConsultaService
{
    protected $repository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->repository = $consultaRepository;
    }

    public function getMyConsulta()
    {
        return $this->repository->getMyConsulta();
    }

    public function getConsulta(string $identify)
    {
        return $this->repository->getConsultaPorCodigo($identify);
    }

    public function storeNovoConsulta(array $data)
    {
        return $this->repository->storeNovaConsulta($data);
    }

    public function editarConsulta(string $identify, array $data)
    {
        return $this->repository->editarConsultaPorCodigo($identify, $data);
    }

        public function deleteConsulta(string $identify)
    {
        return $this->repository->deleteConsultaPorCodigo($identify);
    }
}
