<?php

namespace App\Services;

use App\Repositories\ProcedimentoRepository;

class ProcedimentoService
{
    protected $repository;

    public function __construct(ProcedimentoRepository $procedimentoRepository)
    {
        $this->repository = $procedimentoRepository;
    }

    public function getMyProcedimento()
    {
        return $this->repository->getMyProcedimento();
    }

    public function getProcedimento(string $identify)
    {
        return $this->repository->getPacientePorCodigo($identify);
    }

    public function storeNovoProcedimento(array $data)
    {
        return $this->repository->storeNovoProcedimento($data);
    }

    public function editarProcedimento(string $identify, array $data)
    {
        return $this->repository->editarProcedimentoPorCodigo($identify, $data);
    }

        public function deleteProcedimento(string $identify)
    {
        return $this->repository->deleteProcedimentoPorCodigo($identify);
    }
}
