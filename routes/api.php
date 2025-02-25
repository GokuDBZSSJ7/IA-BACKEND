<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BimestreController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\NotaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('escolas', EscolaController::class);

Route::apiResource('admins', AdminController::class);

Route::apiResource('cursos', CursoController::class);

Route::apiResource('bimestres', BimestreController::class);

Route::apiResource('estudantes', EstudanteController::class);

Route::apiResource('faltas', FaltaController::class);

Route::apiResource('notas', NotaController::class);