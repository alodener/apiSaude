<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Procedimento;
use App\Models\Medico;
use App\Models\Vinculo;


/**
 * Class ConsultaRepository.
 */
class ConsultaRepository
{
    protected $model;

    public function __construct(Consulta $consulta)
    {
        $this->model = $consulta;
    }

    public function getMyConsulta()
    {
        return $this->model->get();
    }
    public function storeNovaConsulta(array $data)
    {
        $paciente = Paciente::where('pac_codigo', $data['fk_pac_codigo'])->get();
        $procedimento = Procedimento::where('proc_codigo', $data['fk_proc_codigo'])->get();
        $vinculo = Vinculo::where([
            ['nr_contrato', $data['fk_nr_contrato']],
            ['fk_pac_codigo', $data['fk_pac_codigo']],
        ])->get();
        $medico = Medico::where('med_codigo', $data['fk_med_codigo'])->get();
        if($paciente->isEmpty() || $medico->isEmpty() || $vinculo->isEmpty() || $procedimento->isEmpty()){
            return false;
        }

        return $this->model->create($data);
    }
    public function getConsultaPorCodigo(string $identify)
    {
        return $this->model
                    ->where('cons_codigo', $identify)
                    ->firstOrFail();
    }

    public function editarConsultaPorCodigo(string $identify, array $data)
    {
        $consulta = $this->getConsultaPorCodigo($identify);

        return $consulta->update($data);
    }

     public function deleteConsultaPorCodigo(string $identify)
    {
        $consulta = $this->getConsultaPorCodigo($identify);

        return $consulta->delete();
    }
}
