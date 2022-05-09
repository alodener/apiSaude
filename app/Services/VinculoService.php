<?php

namespace App\Services;

use App\Repositories\VinculoRepository;

class VinculoService
{
    protected $repository;

    public function __construct(VinculoRepository $vinculoRepository)
    {
        $this->repository = $vinculoRepository;
    }

    public function getMyVinculos()
    {
        return $this->repository->getMyVinculos();
    }

    public function getVinculo(string $identify)
    {
        return $this->repository->getVinculoPorCodigo($identify);
    }

    public function storeNovoVinculo(array $data)
    {
        return $this->repository->storeNovoVinculo($data);
    }
        public function deleteVinculo(string $identify)
    {
        return $this->repository->deleteVinculoPorCodigo($identify);
    }
}
