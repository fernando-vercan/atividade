@extends('dashboard.layouts.app')

@section('content')
    <a class="float-right btn btn-sm btn-outline-primary"
        href="{{ url('produtos/' . $product->id . '/edit') }}">Editar</a>
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
                <label for="categories">Categoria:</label><br>
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
            <label for="active">Ativo:</label>
            <select class="form-control" name="active" id="active" disabled>
                <option value="">Selecione</option>
                <option value="1" @if (isset($product) && $product->active == 1) {{ 'selected' }} @endif>Ativo</option>
                <option value="0" @if (isset($product) && $product->active == 0) {{ 'selected' }} @endif>Inativo</option>
            </select>
        </div>
    </div>


@endsection
