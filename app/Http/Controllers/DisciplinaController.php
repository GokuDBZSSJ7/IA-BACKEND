<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{

    public function index()
    {
        return Disciplina::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'carga_horaria' => 'required',
            'professor' => 'required',
            'turma_id' => 'required'
        ]);

        $materia = Disciplina::create($request->all());

        return $materia;
    }

    public function show($id)
    {
        $materia = Disciplina::findOrFail($id);

        if(!$materia) {
            return response()->json(['message' => "Disciplina não encontrada!"], 404);
        }

        return $materia;
    }

    public function update(Request $request, $id)
    {
        $materia = Disciplina::findOrFail($id);

        if(!$materia) {
            return response()->json(['message' => "Disciplina não encontrada!"], 404);
        }

        $materia->update($request->all());

        return $materia;
    }

    public function destroy($id)
    {
        $materia = Disciplina::findOrFail($id);

        if(!$materia) {
            return response()->json(['message' => "Disciplina não encontrada!"], 404);
        }

        $materia->delete();

        return response()->json(['message' => 'Disciplina deletada com sucesso!']);
    }
}
