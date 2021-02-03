@extends('dashboard.layouts.app')

@section('content')
    <h4 class="">Cadastrar Produto</h4>
    <form action="{{ url('produtos') }}" method="post">
        @csrf

        @include('dashboard._partials.form-product')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
