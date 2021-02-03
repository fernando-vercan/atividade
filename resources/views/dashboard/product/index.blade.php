@extends('dashboard.layouts.app')

@section('content')
    <div class="float-right">
        <a href="{{ url('produtos/create') }}" class="btn btn-sm btn-success">Cadastrar Produto</a>
    </div>
    <table class="mb-0 table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->formatted_price }}</td>
                    <td>{{ $product->formatted_active }}</td>
                    <td>
                        <a href="{{ url('produtos/' . $product->id . '/edit') }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
