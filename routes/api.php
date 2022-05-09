<?php

use App\Http\Controllers\Api\{
    AuthController,
    PacienteController,
    PlanoSaudeController,
    VinculoController,
    ProcedimentoController,
    EspecialidadeController,
    MedicoController,
    ConsultaController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['apiJwt']], function () {

// Pacientes
    Route::get('/pacientes', [PacienteController::class, 'index']);
    Route::get('pacientes/{identify}',[PacienteController::class, 'show']);
    Route::post('/pacientes', [PacienteController::class, 'store']);
    Route::put('/pacientes/{identify}', [PacienteController::class, 'update']);
    Route::delete('/pacientes/{identify}',[PacienteController::class, 'destroy']);

// Plano de Saude
    Route::get('/planoSaude', [PlanoSaudeController::class, 'index']);
    Route::get('planoSaude/{identify}',[PlanoSaudeController::class, 'show']);
    Route::post('/planoSaude',[PlanoSaudeController::class, 'store']);
    Route::put('/planoSaude/{identify}', [PlanoSaudeController::class, 'update']);
    Route::delete('/planoSaude/{identify}',[PlanoSaudeController::class, 'destroy']);

// Vinculo Paciente-Plano
    Route::get('/vinculo', [VinculoController::class, 'index']);
    Route::get('/vinculo/{identify}',[VinculoController::class, 'show']);
    Route::post('/vinculo', [VinculoController::class, 'store']);
    Route::delete('/vinculo/{identify}',[VinculoController::class, 'destroy']);

// Procedimento 
    Route::get('/procedimento', [ProcedimentoController::class, 'index']);
    Route::get('/procedimento/{identify}', [ProcedimentoController::class, 'show']);
    Route::post('/procedimento',[ProcedimentoController::class, 'store']);
    Route::put('/procedimento/{identify}', [ProcedimentoController::class, 'update']);
    Route::delete('/procedimento/{identify}',[ProcedimentoController::class, 'destroy']);

// Especialidade
    Route::get('/especialidade', [EspecialidadeController::class, 'index']);
    Route::get('/especialidade/{identify}', [EspecialidadeController::class, 'show']);
    Route::post('/especialidade',[EspecialidadeController::class, 'store']);
    Route::put('/especialidade/{identify}', [EspecialidadeController::class, 'update']);
    Route::delete('/especialidade/{identify}',[EspecialidadeController::class, 'destroy']);

// Medico
    Route::get('/medico', [MedicoController::class, 'index']);
    Route::get('/medico/{identify}', [MedicoController::class, 'show']);
    Route::post('/medico',[MedicoController::class, 'store']);
    Route::put('/medico/{identify}', [MedicoController::class, 'update']);
    Route::delete('/medico/{identify}',[MedicoController::class, 'destroy']);

// Consulta
    Route::get('/consulta', [ConsultaController::class, 'index']);
    Route::get('/consulta/{identify}', [ConsultaController::class, 'show']);
    Route::post('/consulta',[ConsultaController::class, 'store']);
    Route::put('/consulta/{identify}', [ConsultaController::class, 'update']);
    Route::delete('/consulta/{identify}',[ConsultaController::class, 'destroy']);
});
