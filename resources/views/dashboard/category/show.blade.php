@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}" disabled>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="active">Status</label>
                <select class="form-control" name="active" disabled>
                    <option value="1" @if (isset($category) && $category->active == 1) {{ 'selected' }} @endif>Ativo</option>
                    <option value="0" @if (isset($category) && $category->active == 0) {{ 'selected' }} @endif>Inativo</option>
                </select>
            </div>
        </div>
    </div>
@endsection
