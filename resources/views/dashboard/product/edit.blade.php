@extends('dashboard.layouts.app')

@section('content')
    <h4 class="">Editar Produto</h4>
    <form action="{{ url('produtos') }}" method="post">
        @method('PUT')
        @csrf

        @include('dashboard._partials.form-product')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Editar</button>
        </div>
    </form>
@endsection
