<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" value="{{ $category->name ?? '' }}" required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="active">Status</label>
            <select class="form-control" name="active" required>
                <option value="">Selecione</option>
                <option value="1" @if (isset($product) && $product->active == 1) {{ 'selected' }} @endif>Ativo</option>
            <option value="0" @if (isset($product) && $product->active == 0) {{ 'selected' }} @endif>Inativo</option>
            </select>
        </div>
    </div>
</div>
