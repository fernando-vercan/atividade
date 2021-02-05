@extends('product::layouts.master')

@section('content')
    <a class="float-right btn btn-sm btn-outline-primary"
        href="{{ route('produtos.edit', $product->id) }}">Editar</a>
    <h4 class="">Ver Produto</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input class="form-control" type="text" name="name" id="name"
                    value=" {{ $product->name ?? @old('name') }} " disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Preço R$:</label>
                <input class="form-control" type="text" name="price" id="price" onkeyup="k(this);"
                    value=" {{ $product->price ?? @old('price') }} " disabled>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="categories">Categorias:</label><br>
                <select class="form-control js-example-basic-multiple-limit" multiple name="categories_ids[]"
                    id="categories" disabled>
                    <option value="">Selecione</option>
                    @foreach ($product->categories as $category)
                        <option value="{{ $category->id }}" selected>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="active">Ativo</label>
                <input class="form-control" type="text" name="active" value="{{ $product->formatted_active }}" disabled>
            </div>
        </div>
    </div>
@endsection
