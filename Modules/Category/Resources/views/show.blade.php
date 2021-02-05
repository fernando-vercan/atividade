@extends('category::layouts.master')

@section('content')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}" disabled>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="active">Ativo</label>
                <input class="form-control" type="text" name="active" value="{{ $category->formatted_active }}" disabled>
            </div>
        </div>
    </div>
@endsection
