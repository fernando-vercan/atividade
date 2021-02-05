@extends('category::layouts.master')

@section('content')
    <h4 class="">Cadastrar Categoria</h4>

    @include('category::_partials.alert-success')

    @include('category::_partials.alert-danger')

    <form action="{{ route('categorias.store') }}" method="post">
        @csrf

        @include('category::_partials.form-category')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
