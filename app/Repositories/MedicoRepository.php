<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Medico;
use App\Models\Especialidade;

/**
 * Class MedicoRepository.
 */
class MedicoRepository
{
     protected $model;

    public function __construct(Medico $medico)
    {
        $this->model = $medico;
    }

    public function getMyMedico()
    {
        return $this->model->get();
    }
    public function storeNovoMedico(array $data)
    {
        $especialidade = Especialidade::where('espec_codigo', $data['fk_espec_codigo'])->get();
        if($especialidade->isEmpty()){
            return false;
        }
        return $this->model->create($data);
    }
    public function getMedicoPorCodigo(string $identify)
    {
        return $this->model
                    ->where('med_codigo', $identify)
                    ->firstOrFail();
    }

    public function editarMedicoPorCodigo(string $identify, array $data)
    {
        $medico = $this->getMedicoPorCodigo($identify);

        return $medico->update($data);
    }

     public function deleteMedicoPorCodigo(string $identify)
    {
        $medico = $this->getMedicoPorCodigo($identify);

        return $medico->delete();
    }

}
