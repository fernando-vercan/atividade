@extends('product::layouts.master')

@section('content')
    <h2>Listar Produtos</h2>

    @include('product::_partials.alert-success')

    <div class="float-right">
        <a href="{{ route('produtos.create') }}" class="btn btn-sm btn-success">Cadastrar Produto</a>
    </div>
    <table class="mb-0 table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ativo</th>
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
                        <div class="btn-group">
                            <a class="btn btn-sm btn-link"
                                href="{{ route('produtos.show', $product->id) }}">Visualizar</a>
                            <a class="btn btn-sm btn-link" href="{{ route('produtos.edit', $product->id) }}">Editar</a>
                            <form action="{{ route('produtos.destroy', $product->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
