<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    public function index()
    {
        return Curso::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'admin_id' => 'required',
            'escola_id' => 'required'
        ]);

        $curso = Curso::create($request->all());

        return response()->json($curso, 201);
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return $curso;
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $curso->update($request->all());

        return $curso;
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return response()->json(['message' => 'Curso deletado com sucesso!']);
    }

    public function getCursoByAdminId($id)
    {
        $curso = Curso::where('admin_id', $id)->get();
        return $curso;
    }
}
