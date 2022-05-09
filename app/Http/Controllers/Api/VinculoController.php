<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VinculoResource;
use App\Http\Requests\StoreVinculo;
use App\Services\VinculoService;

class VinculoController extends Controller
{
    protected $vinculoService;

    public function __construct(VinculoService $vinculoService)
    {
        $this->vinculoService = $vinculoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vinculo = $this->vinculoService->getMyVinculos();

        return VinculoResource::collection($vinculo);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $vinculo = $this->vinculoService->getVinculo($identify);

        return new VinculoResource($vinculo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVinculo $request)
    {
        $vinculo = $this->vinculoService->storeNovoVinculo($request->validated());
         if($vinculo == false){
             return response()->json(['message' => 'Paciente ou Plano não existem.']);
         }      
        return new VinculoResource($vinculo);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $identify)
    {
        $plano = $this->vinculoService->deleteVinculo($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }



}
