<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        return Turma::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'ano' => 'required|integer',
            'curso_id' => 'required'
        ]);

        $turma = Turma::create($request->all());
        return response()->json($turma, 201);
    }

    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        if(!$turma) {
            return response()->json(['message' => "Turma não encontrada!"], 404);
        }

        return $turma;
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);
        if(!$turma) {
            return response()->json(['message' => "Turma não encontrada!"], 404);
        }

        $turma->update($request->all());
        return $turma;
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        if(!$turma) {
            return response()->json(['message' => "Turma não encontrada!"], 404);
        }

        $turma->delete();

        return response()->json("turma deletada com sucesso!");
    }

    public function getTurmaByCursoId($id)
    {
        $turmas = Turma::where('curso_id', $id)->get();
        return $turmas;
    }
}
