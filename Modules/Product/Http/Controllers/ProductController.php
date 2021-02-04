<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Http\Requests\FormProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product::index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('product::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FormProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProductRequest $request)
    {
        $product = Product::create($request->all());

        $product->categories()->sync($request->categories_ids);

        return redirect()->route('produtos.create')->with('message', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);

        return view('product::show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);

        $categories_ids = $product->categories->pluck('id')->toArray();

        $categories = Category::whereNotIn('id', $categories_ids)->get();

        return view('product::edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        $product->categories()->sync($request->categories_ids);

        return redirect()->route('produtos.edit', $product->id)->with('message', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        $product->delete();
        
        return redirect()->route('produtos.index')->with('message', 'Deletado com sucesso!');
    }
}
