<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    
    public function index()
    {
        return Escola::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required'
        ]);

        // return $request;

        $escola = Escola::create($request->all());

        return response()->json($escola, 201);
    }

    public function show($id)
    {
        $escola = Escola::findOrFail($id);

        return $escola;
    }

    public function update(Request $request, $id)
    {
        $escola = Escola::findOrFail($id);

        $escola->update($request->all());

        return $escola;
    }

    public function destroy($id)
    {
        $escola = Escola::findOrFail($id);
        $escola->delete();

        return response()->json(["message" => "Instituição deletada com sucesso!"]);
    }
}
