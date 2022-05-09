<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Procedimento;

/**
 * Class ProcedimentoRepository.
 */
class ProcedimentoRepository
{

    protected $model;

    public function __construct(Procedimento $procedimento)
    {
        $this->model = $procedimento;
    }
      public function getMyProcedimento()
    {
        return $this->model->get();
    }
    public function storeNovoProcedimento(array $data)
    {
        return $this->model->create($data);
    }
    public function getProcedimentoPorCodigo(string $identify)
    {
        return $this->model
                    ->where('proc_codigo', $identify)
                    ->firstOrFail();
    }

    public function editarProcedimentoPorCodigo(string $identify, array $data)
    {
        $procedimento = $this->getProcedimentoPorCodigo($identify);

        return $procedimento->update($data);
    }

     public function deleteProcedimentoPorCodigo(string $identify)
    {
        $procedimento = $this->getProcedimentoPorCodigo($identify);

        return $procedimento->delete();
    }
}
