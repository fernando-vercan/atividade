@extends('dashboard.layouts.app')

@section('content')
    <div class="float-right">
        <a href="" class="btn btn-sm btn-success">Cadastrar Produto</a>
    </div>
    <table class="mb-0 table">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
@endsection
