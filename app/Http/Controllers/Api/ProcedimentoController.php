<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProcedimentoResource;
use App\Http\Requests\StoreProcedimento;
use App\Services\ProcedimentoService;


class ProcedimentoController extends Controller
{
    protected $procedimentoService;

    public function __construct(ProcedimentoService $procedimentoService)
    {
        $this->procedimentoService = $procedimentoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimento = $this->procedimentoService->getMyProcedimento();

        return ProcedimentoResource::collection($procedimento);
    }
     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $procedimento = $this->procedimentoService->getProcedimento($identify);

        return new ProcedimentoResource($procedimento);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProcedimento $request)
    {
        $procedimento = $this->procedimentoService->storeNovoProcedimento($request->validated());

        return new ProcedimentoResource($procedimento);
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProcedimento $request, string $identify)
    {
        $procedimento = $this->procedimentoService->editarProcedimento($identify, $request->validated());

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
        $procedimento = $this->procedimentoService->deleteProcedimento($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
