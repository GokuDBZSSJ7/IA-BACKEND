<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{

    public function index()
    {
        return Nota::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'bimestre_id' => 'required',
            'estudante_id' => 'required',
            'disciplina' => 'required',
            'nota' => 'required'
        ]);

        $nota = Nota::create($request->all());

        return response()->json($nota, 201);
    }

    public function show($id)
    {
        return Nota::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);

        if(!$nota) {
            return response()->json(['message' => 'Nota não encontrada!'], 404);
        }

        $nota->update($request->all());

        return $nota;
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);

        if(!$nota) {
            return response()->json(['message' => 'Nota não encontrada!'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota foi deletada!']);
    }
}
