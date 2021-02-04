@extends('dashboard.layouts.app')

@section('content')
    <div class="float-right">
        <a href="{{ url('produtos/create') }}" class="btn btn-sm btn-success">Cadastrar Produto</a>
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
            <tr>
                
            </tr>
        </tbody>
    </table>
@endsection
