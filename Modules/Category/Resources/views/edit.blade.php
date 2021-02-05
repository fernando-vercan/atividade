@extends('category::layouts.master')

@section('content')
    <h4 class="">Editar Categoria</h4>

    @include('category::_partials.alert-success')

    @include('category::_partials.alert-danger')

    <form action="{{ route('categorias.update', $category->id) }}" method="post">
        @method('PUT')
        @csrf

        @include('category::_partials.form-category')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Editar</button>
        </div>
    </form>
@endsection
