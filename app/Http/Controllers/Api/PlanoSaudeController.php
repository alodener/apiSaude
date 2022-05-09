<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PlanoSaudeResource;
use App\Http\Requests\StorePlanoSaude;
use App\Services\PlanoSaudeService;

class PlanoSaudeController extends Controller
{
    protected $planoSaudeService;

    public function __construct(PlanoSaudeService $planoSaudeService)
    {
        $this->planoSaudeService = $planoSaudeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plano = $this->planoSaudeService->getMyPlanosSaudes();

        return PlanoSaudeResource::collection($plano);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $plano = $this->planoSaudeService->getPlanosSaudes($identify);

        return new PlanoSaudeResource($plano);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanoSaude $request)
    {
        $plano = $this->planoSaudeService->storeNovoPlano($request->validated());

        return new PlanoSaudeResource($plano);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StorePlanoSaude $request, string $identify)
    {
        $plano = $this->planoSaudeService->editarPlanoSaude($identify, $request->validated());

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
        $plano = $this->planoSaudeService->deletePlano($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
