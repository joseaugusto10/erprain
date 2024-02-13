<?php

namespace App\Http\Controllers;

use App\Models\Financeiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    // Aplica o middleware de autenticação em todos os métodos, exceto 'index' e 'show'
    public function __construct()
    {
        $this->middleware('api')->except(['index', 'show']);
    }

    // Retorna todos os registros financeiros
    public function index()
    {
        $financeiros = Financeiro::with('produto')->get();
        return response()->json($financeiros);
    }

    // Retorna um registro financeiro específico pelo ID
    public function show($id)
    {
        $financeiro = Financeiro::with('produto')->find($id);
        return response()->json($financeiro);
    }

    // Armazena um novo registro financeiro
    public function store(Request $request)
    {
        $financeiro = Financeiro::create($request->all());
        return response()->json($financeiro, 201);
    }

    // Atualiza um registro financeiro existente
    public function update(Request $request, $id)
    {
        $financeiro = Financeiro::findOrFail($id);
        $financeiro->update($request->all());
        return response()->json($financeiro, 200);
    }

    // Exclui um registro financeiro existente
    public function destroy($id)
    {
        Financeiro::findOrFail($id)->delete();
        return response()->json('Financeiro deletado com sucesso', 200);
    }
}

