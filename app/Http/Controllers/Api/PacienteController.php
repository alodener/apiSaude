<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PacienteResource;
use App\Http\Requests\StorePaciente;
use App\Services\PacientesService;

class PacienteController extends Controller
{
    protected $pacienteService;

    public function __construct(PacientesService $pacienteService)
    {
        $this->pacienteService = $pacienteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = $this->pacienteService->getMyPacientes();

        return PacienteResource::collection($pacientes);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $paciente = $this->pacienteService->getPaciente($identify);

        return new PacienteResource($paciente);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaciente $request)
    {
        $paciente = $this->pacienteService->storeNovoPaciente($request->validated());

        return new PacienteResource($paciente);
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StorePaciente $request, string $identify)
    {
        $paciente = $this->pacienteService->editarPaciente($identify, $request->validated());

        return response()->json(['message' => 'Editado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $identify)
    {
        $paciente = $this->pacienteService->deletePaciente($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
