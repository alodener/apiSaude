<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\EspecialidadeResource;
use App\Http\Requests\StoreEspecialidade;
use App\Services\EspecialidadeService;

class EspecialidadeController extends Controller
{
    protected $especialidadeService;

    public function __construct(EspecialidadeService $especialidadeService)
    {
        $this->especialidadeService = $especialidadeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidade = $this->especialidadeService->getMyEspecialidade();

        return EspecialidadeResource::collection($especialidade);
    }

     /**
     * Display the specified resource.
     *
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function show($identify)
    {
        $especialidade = $this->especialidadeService->getEspecialidade($identify);

        return new EspecialidadeResource($especialidade);
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEspecialidade $request)
    {
        $especialidade = $this->especialidadeService->storeNovoEspecialidade($request->validated());

        return new EspecialidadeResource($especialidade);
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $identify
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEspecialidade $request, string $identify)
    {
        $especialidade = $this->especialidadeService->editarEspecialidade($identify, $request->validated());

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
        $especialidade = $this->especialidadeService->deleteEspecialidade($identify);

        return response()->json(['message' => 'Removido com sucesso.']);
    }
}
