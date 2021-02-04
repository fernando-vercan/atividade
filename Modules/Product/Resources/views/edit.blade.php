@extends('dashboard.layouts.app')

@section('content')
    <h4 class="">Editar Produto</h4>

    @include('dashboard._partials.alert-success')

    @include('dashboard._partials.alert-danger')

    <form action="{{ route('produtos.update', $product->id) }}" method="post">
        @method('PUT')
        @csrf

        @include('dashboard._partials.form-product')

        <div class="float-right">
            <button class="btn btn-sm btn-primary">Editar</button>
        </div>
    </form>
@endsection
