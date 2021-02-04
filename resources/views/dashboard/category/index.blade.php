@extends('dashboard.layouts.app')

@section('content')
    <div class="float-right">
        <a href="{{ url('produtos/create') }}" class="btn btn-sm btn-success">Cadastrar Categoria</a>
    </div>
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
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
