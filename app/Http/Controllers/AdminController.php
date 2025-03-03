<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'escola_id' => 'required'
        ]);

        $admin = Admin::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'escola_id' => $request->escola_id
        ]);

        return response()->json($admin, 201);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return $admin;
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->update($request->all());
        return $admin;
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(['message' => 'Admin deletado com sucesso']);
    }

    public function getTurmasByAdminId($admin_id)
    {
        $cursoIds = Curso::where('admin_id', $admin_id)->pluck('id');

        $turmas = Turma::whereIn('curso_id', $cursoIds)->get(); // Busca as turmas desses cursos

        return response()->json($turmas);
    }

    public function getDisciplinasByAdminId($admin_id)
    {
        $cursoIds = Curso::where('admin_id', $admin_id)->pluck('id');

        $turmas = Turma::whereIn('curso_id', $cursoIds)->pluck('id');

        $disciplinas = Disciplina::whereIn('turma_id', $turmas)->get();

        return response()->json($disciplinas);
    }

    public function getEstudantesByAdminId($id)
    {
        
    }
}
