<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bimestre;
use App\Models\Curso;
use Illuminate\Http\Request;

class BimestreController extends Controller
{

    public function index()
    {
        return Bimestre::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'ano' => 'required',
            'inicio' => 'required',
            'fim' => 'required',
            'curso_id' => 'required'
        ]);

        $bimestre = Bimestre::create($request->all());

        return response()->json($bimestre, 201);
    }

    public function show($id)
    {
        $bimestre = Bimestre::findOrFail($id);

        return $bimestre;
    }

    public function update(Request $request, $id)
    {
        $bimestre = Bimestre::findOrFail($id);

        $bimestre->update($request->all());

        return $bimestre;
    }

    public function destroy($id)
    {
        $bimestre = Bimestre::findOrFail($id);
        $bimestre->delete();

        return response()->json(['message' => 'Bimestre deletado com sucesso!']);
    }

    public function getBimestresByAdminId($admin_id)
    {
        $cursoIds = Curso::where('admin_id', $admin_id)->pluck('id');

        $bimestres = Bimestre::whereIn('curso_id', $cursoIds)->get(); 
        return response()->json($bimestres);
    }
}
