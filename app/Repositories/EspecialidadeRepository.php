<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Especialidade;

/**
 * Class EspecialidadeRepository.
 */
class EspecialidadeRepository
{
     protected $model;

    public function __construct(Especialidade $especialidade)
    {
        $this->model = $especialidade;
    }

    public function getMyEspecialidade()
    {
        return $this->model->get();
    }
    public function storeNovoEspecialidade(array $data)
    {
        return $this->model->create($data);
    }
    public function getEspecialidadePorCodigo(string $identify)
    {
        return $this->model
                    ->where('espec_codigo', $identify)
                    ->firstOrFail();
    }

    public function editarEspecialidadePorCodigo(string $identify, array $data)
    {
        $especialidade = $this->getEspecialidadePorCodigo($identify);

        return $especialidade->update($data);
    }

     public function deleteEspecialidadePorCodigo(string $identify)
    {
        $especialidade = $this->getEspecialidadePorCodigo($identify);

        return $especialidade->delete();
    }

}
