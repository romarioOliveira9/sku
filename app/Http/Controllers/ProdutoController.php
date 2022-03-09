<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaProdutos = Produto::all();

        return view('produtos.index', compact('listaProdutos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome' => 'required|max:255',
            'preço' => 'required|numeric',
            'quantidade' => 'required|numeric',
            'sku' => 'required'
        ]);
        $show = Produto::create($validateData);

        return redirect('/produtos')->with('success', 'Produto salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaProduto = Produto::findOrFail($id);

        return view('produtos.edit', compact('listaProduto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'preço' => 'required|numeric',
            'quantidade' => 'required|numeric',
            'sku' => 'required'
        ]);
        Produto::whereId($id)->update($validatedData);

        return redirect('/produtos')->with('success', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listaProduto = Produto::findOrFail($id);
        $listaProduto->delete();

        return redirect('/produtos')->with('success', 'Produto deletado com sucesso');
    }
}
