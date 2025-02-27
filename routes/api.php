<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BimestreController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DesempenhoDisciplinaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('escolas', EscolaController::class);

Route::apiResource('admins', AdminController::class);
Route::get('getTurmasDoAdmin/{id}', [AdminController::class, 'getTurmasByAdminId']);

Route::apiResource('cursos', CursoController::class);

Route::apiResource('bimestres', BimestreController::class);

Route::apiResource('estudantes', EstudanteController::class);

Route::apiResource('turmas', TurmaController::class);
Route::get('getTurmaByCursoId/{id}', [TurmaController::class, 'getTurmaByCursoId']);

Route::apiResource('disciplinas', DisciplinaController::class);

Route::apiResource('desempenhos', DesempenhoDisciplinaController::class);

Route::post('login', [LoginController::class, 'login']);