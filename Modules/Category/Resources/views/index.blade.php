@extends('category::layouts.master')

@section('content')
    <h2>Listar Categorias</h2>
    <div class="float-right">
        <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-success">Cadastrar Categoria</a>
    </div>
    @include('category::_partials.alert-success')
    <table class="mb-0 table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->formatted_active }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-link"
                                href="{{ route('categorias.show', $category->id) }}">Visualizar</a>
                            <a class="btn btn-sm btn-link" href="{{ route('categorias.edit', $category->id) }}">Editar</a>
                            <form action="{{ route('categorias.destroy', $category->id) }}" method="post">
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
