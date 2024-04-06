<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'image_url' => 'nullable|url'
        ]);

        // Crie o produto
        $produto = Produto::create($validatedData);

        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category' => 'required|string',
            'image_url' => 'nullable|url'
        ]);

        // Encontre o produto pelo ID
        $produto = Produto::findOrFail($id);

        // Atualize os dados do produto
        $produto->update($validatedData);

        return response()->json($produto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $produto = Produto::find($request->id);

        $produto->delete();

        return response("Tudo certo, apagado", 200);
    }



    /**
     * Busca produtos pelo nome e categoria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByNameAndCategory(Request $request)
    {
        // Valida os dados de entrada
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string', // Nome pode ser obrigatório apenas se presente
            'category' => 'sometimes|required|string', // Categoria pode ser obrigatória apenas se presente
        ]);

        // Crie um array para armazenar as condições da consulta
        $conditions = [];

        // Verifique se o parâmetro 'name' está presente e adicione-o às condições da consulta
        if (isset($validatedData['name'])) {
            $conditions[] = ['name', 'like', '%' . $validatedData['name'] . '%'];
        }

        // Verifique se o parâmetro 'category' está presente e adicione-o às condições da consulta
        if (isset($validatedData['category'])) {
            $conditions[] = ['category', '=', $validatedData['category']];
        }

        // Execute a consulta com as condições construídas
        $produtos = Produto::where($conditions)->get();

        // Retorna os resultados da consulta em formato JSON
        return response()->json($produtos, 200);
    }


    /**
     * Busca produtos por categoria específica.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByCategory(Request $request)
    {
        // Valida os dados de entrada
        $validatedData = $request->validate([
            'category' => 'required|string',
        ]);

        // Executa a consulta para buscar produtos por uma categoria específica
        $produtos = Produto::where('category', $validatedData['category'])->get();

        // Retorna os resultados da consulta em formato JSON
        return response()->json($produtos, 200);
    }

    /**
     * Busca produtos com ou sem imagem.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByImage(Request $request)
    {
        // Verifica se o parâmetro 'image_url' está presente na solicitação
        $withImage = $request->has('image_url');

        // Executa a consulta para buscar produtos com ou sem imagem, dependendo da opção fornecida
        if (!empty($withImage)) {
            // Se 'image_url' estiver presente na solicitação, retorna produtos com 'image_url'
            $produtos = Produto::whereNotNull('image_url')->get();
        } else {
            // Se 'image_url' não estiver presente na solicitação, retorna produtos sem 'image_url'
            $produtos = Produto::whereNull('image_url')->get();
        }

        // Retorna os resultados da consulta em formato JSON
        return response()->json($produtos, 200);
    }


    /**
     * Busca um produto pelo seu ID único.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchById($id)
    {
        // Busca o produto pelo ID fornecido
        $produto = Produto::findOrFail($id);

        // Retorna o produto encontrado em formato JSON
        return response()->json($produto, 200);
    }
}
