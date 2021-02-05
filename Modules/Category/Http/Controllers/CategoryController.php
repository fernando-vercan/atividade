<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Category\Http\Requests\FormCategoryRequest;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('active', function ($data) {
                        return ($data->active == 1) ? "Sim" : "Não";
                    })
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="categorias/ver/'.$row->id.'" class="btn btn-link btn-sm">Visualizar</a>';
                        $btn = $btn.'<a href="categorias/editar/'.$row->id.'" class="btn btn-link btn-sm">Editar</a>';
                        $btn = $btn.'<a id="delete" data-id="'.$row->id.'" class="btn btn-sm btn-danger">Delete</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('category::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categorias.index')->with('message', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('category::show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('categorias.index')->with('message', 'Atualizado com sucesso!');
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

            $category = Category::findOrFail($id);

            $category->delete();

            return response()->json(['message' => 'Deletado com sucesso!']);
        }

        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categorias.index')->with('message', 'Deletado com sucesso!');
    }
}
