<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DesempenhoDisciplina;
use Illuminate\Http\Request;

class DesempenhoDisciplinaController extends Controller
{
    public function index()
    {
        return DesempenhoDisciplina::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudante_id' => 'required',
            'disciplina_id' => 'required',
            'bimestre_id' => 'required',
            'turma_id' => 'required',
            'nota' => 'nullable',
            'frequencia' => 'required',
        ]);

        $item = DesempenhoDisciplina::create($request->all());

        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = DesempenhoDisciplina::findOrFail($id);

        if(!$item) {
            return response()->json(['message' => 'Item não encontrado!'], 404);
        }

        return $item;
    }

    public function update(Request $request, $id)
    {
        $item = DesempenhoDisciplina::findOrFail($id);

        if(!$item) {
            return response()->json(['message' => 'Item não encontrado!'], 404);
        }

        $item->update($request->all());

        return $item;
    }

    public function destroy($id)
    {
        $item = DesempenhoDisciplina::findOrFail($id);

        if(!$item) {
            return response()->json(['message' => 'Item não encontrado!'], 404);
        }

        $item->delete();

        return response()->json(['message' => "Item Deletado com Sucesso!"]);
    }
}
