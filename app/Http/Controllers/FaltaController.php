<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Falta;
use Illuminate\Http\Request;

class FaltaController extends Controller
{

    public function index()
    {
        return Falta::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'bimestre_id',
            'estudante_id',
            'data',
            'presente',
            'faltas_consecutivas'
        ]);

        $falta = Falta::create($request->all());

        return response()->json($falta, 201);
    }

    public function show($id)
    {
        $falta = Falta::findOrFail($id);
        return $falta;
    }

    public function update(Request $request, $id)
    {
        $falta = Falta::findOrFail($id);

        if(!$falta) {
            return response()->json(['message' => 'Falta não encontrada!'], 404);
        }

        $falta->update($request->all());

        return $falta;
    }

    public function destroy($id)
    {
        $falta = Falta::findOrFail($id);

        if(!$falta) {
            return response()->json(['message' => 'Falta não encontrada!'], 404);
        }

        $falta->delete();

        return response()->json(['message' => 'Falta deletada com sucesso!']);
    }
}
