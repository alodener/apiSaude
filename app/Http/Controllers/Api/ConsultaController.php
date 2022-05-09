<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ConsultaResource;
use App\Http\Requests\StoreConsulta;
use App\Services\ConsultaService;

class ConsultaController extends Controller
{
     protected $consultaService;

    public function __construct(ConsultaService $consultaService)
    {
        $this->consultaService = $consultaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta = $this->consultaService->getMyConsulta();

        return ConsultaResource::collection($consulta);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $consulta = $this->consultaService->getConsulta($identify);
     
        return new ConsultaResource($consulta);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsulta $request)
    {
        $consulta = $this->consultaService->storeNovoConsulta($request->validated());
        if($consulta == false){
             return response()->json(['message' => 'Paciente, medico, Contrato ou procedimento não existem']);
         }      
        return new ConsultaResource($consulta);
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConsulta $request, string $identify)
    {
        $consulta = $this->consultaService->editarConsulta($identify, $request->validated());

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
        $consulta = $this->consultaService->deleteConsulta($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
