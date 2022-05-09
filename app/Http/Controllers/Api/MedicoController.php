<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MedicoResource;
use App\Http\Requests\StoreMedico;
use App\Services\MedicoService;

class MedicoController extends Controller
{
    protected $medicoService;

    public function __construct(MedicoService $medicoService)
    {
        $this->medicoService = $medicoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medico = $this->medicoService->getMyMedico();

        return MedicoResource::collection($medico);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $medico = $this->medicoService->getMedico($identify);

        return new MedicoResource($medico);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedico $request)
    {
        $medico = $this->medicoService->storeNovoMedico($request->validated());
        if($medico == false){
             return response()->json(['message' => 'Não existe essa especialidade']);
         }      
        return new MedicoResource($medico);
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMedico $request, string $identify)
    {
        $medico = $this->medicoService->editarMedico($identify, $request->validated());

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
        $medico = $this->medicoService->deleteMedico($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
