<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{

    public function index()
    {
        return Alerta::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'bimestre_id' => 'required',
            'estudante_id' => 'required',
            'mensagem' => 'required',
            'detalhes' => 'required',
            'nivel' => 'required',
            'grave' => 'required'
        ]);

        $alerta = Alerta::create($request->all());
        return response()->json($alerta, 201);
    }

    public function show($id)
    {
        return Alerta::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $alerta = Alerta::findOrFail($id);

        if(!$alerta) {
            return response()->json(['message' => 'Alerta não foi encontrado!'], 404);
        }

        $alerta->update($request->all());

        return $alerta;
    }

    public function destroy($id)
    {
        $alerta = Alerta::findOrFail($id);

        if(!$alerta) {
            return response()->json(['message' => 'Alerta não foi encontrado!'], 404);
        }

        $alerta->delete();
        return response()->json(['message' => 'Alerta deletado com sucesso!']);
    }
}
