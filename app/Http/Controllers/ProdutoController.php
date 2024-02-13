<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Aplica o middleware de autenticação em todos os métodos, exceto 'index' e 'show'
    public function __construct()
    {
        $this->middleware('api')->except(['index', 'show']);
    }

    // Retorna todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    // Retorna um produto específico pelo ID
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto);
    }

    // Armazena um novo produto
    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    // Atualiza um produto existente
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    // Exclui um produto existente
    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return response()->json('Produto deletado com sucesso', 200);
    }
}

