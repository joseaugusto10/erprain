<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    // Aplica o middleware de autenticação em todos os métodos, exceto 'index' e 'show'
    public function __construct()
    {
        $this->middleware('api')->except(['index', 'show']);
    }

    // Retorna todos os estoques
    public function index()
    {
        $estoques = Estoque::with('produto')->get();
        return response()->json($estoques);
    }

    // Retorna um estoque específico pelo ID
    public function show($id)
    {
        $estoque = Estoque::with('produto')->find($id);
        return response()->json($estoque);
    }

    // Armazena um novo estoque
    public function store(Request $request)
    {
        $estoque = Estoque::create($request->all());
        return response()->json($estoque, 201);
    }

    // Atualiza um estoque existente
    public function update(Request $request, $id)
    {
        $estoque = Estoque::findOrFail($id);
        $estoque->update($request->all());
        return response()->json($estoque, 200);
    }

    // Exclui um estoque existente
    public function destroy($id)
    {
        Estoque::findOrFail($id)->delete();
        return response()->json('Estoque deletado com sucesso', 200);
    }
}
