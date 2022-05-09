<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Paciente;


/**
 * Class PacientesRepository.
 */
class PacientesRepository
{
    protected $model;

    public function __construct(Paciente $pacientes)
    {
        $this->model = $pacientes;
    }

    public function getMyPacientes()
    {
        return $this->model->get();
    }
    public function storeNovoPaciente(array $data)
    {
        return $this->model->create($data);
    }
    public function getPacientePorCodigo(string $identify)
    {
        return $this->model
                    ->where('pac_codigo', $identify)
                    ->firstOrFail();
    }

    public function editarPacientePorCodigo(string $identify, array $data)
    {
        $paciente = $this->getPacientePorCodigo($identify);

        return $paciente->update($data);
    }

     public function deletePacientePorCodigo(string $identify)
    {
        $paciente = $this->getPacientePorCodigo($identify);

        return $paciente->delete();
    }

}
