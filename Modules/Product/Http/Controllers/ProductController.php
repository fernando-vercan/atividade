<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Product\Http\Requests\FormProductRequest;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('active', function ($data) {
                        return ($data->active == 1) ? "Sim" : "Não";
                    })
                    ->editColumn('price', function ($data) {
                        return 'R$ ' . number_format($data->price, 2, ',', '.');
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="produtos/ver/'.$row->id.'" class="btn btn-link btn-sm">Visualizar</a>';
                        $btn = $btn.'<a href="produtos/editar/'.$row->id.'" class="btn btn-link btn-sm">Editar</a>';
                        $btn = $btn.'<a id="delete" data-id="'.$row->id.'" class="btn btn-sm btn-danger">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('product::index');
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
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);

            $product->delete();

            return response()->json(['message' => 'Deletado com sucesso!']);
        }
        
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('produtos.index')->with('message', 'Deletado com sucesso!');
    }
}
