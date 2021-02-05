@extends('product::layouts.master')

@section('content')
    <h4 class="">Cadastrar Produto</h4>

    @include('product::_partials.alert-success')

    @include('product::_partials.alert-danger')

    <form action="{{ route('produtos.store') }}" method="post">
        @csrf

        @include('product::_partials.form-product')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('js/product.js') }}" type="text/javascript"></script>
@endsection
