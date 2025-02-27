<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dado;
use App\Models\Estudante;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{

    public function index()
    {
        return Estudante::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'curso_id' => 'required',
            'bimestre_id' => 'required',
            'escola_id' => 'required',
            'turma_id' => 'required',
            'renda_familiar' => 'nullable',
            'bolsa' => 'nullable',
            'distancia' => 'nullable'
        ]);

        $estudante = Estudante::create($request->all());

        Dado::create([
            'estudante_id' => $estudante->id,
            'renda_familiar' => $estudante->renda_familiar,
            'bolsa' => $estudante->bolsa,
            'distancia' => $estudante->distancia
        ]);

        return response()->json($estudante);
    }

    public function show($id)
    {
        $estudante = Estudante::findOrFail($id);

        return $estudante;
    }

    public function update(Request $request, $id)
    {
        $estudante = Estudante::findOrFail($id);

        $estudante->update($request->all());

        return $estudante;
    }

    public function destroy($id)
    {
        $estudante = Estudante::findOrFail($id);

        if(!$estudante) {
            return response()->json("Estudante Não encontrado", 404);
        }

        $estudante->delete();

        return response()->json(['message' => 'Estudante deletado com sucesso!']);
    }
}
