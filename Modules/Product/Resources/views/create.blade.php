@extends('dashboard.layouts.app')

@section('content')
    <h4 class="">Cadastrar Produto</h4>

    @include('dashboard._partials.alert-success')

    @include('dashboard._partials.alert-danger')

    <form action="{{ route('produtos.store') }}" method="post">
        @csrf

        @include('dashboard._partials.form-product')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('js/product.js') }}" type="text/javascript"></script>
@endsection