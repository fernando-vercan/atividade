<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" name="name" id="name"
                value=" {{ $product->name ?? @old('name') }} ">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label for="name">Preço R$:</label>
            <input class="form-control" type="text" name="price" id="price" onkeyup="k(this);"
                value=" {{ $product->price ?? @old('price') }} ">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="categories">Categoria:</label><br>
            <select class="form-control js-example-basic-multiple-limit" multiple name="categories_ids[]"
                id="categories">
                <option value="">Selecione</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}" {{ !empty(old('categories_ids')) && in_array($category->id, old('categories_ids')) ? ' selected="selected"' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <label for="active">Ativo:</label>
        <select class="form-control" name="active" id="active">
            <option value="">Selecione</option>
            <option value="1" @if(isset($product) && $product->active == 1){{"selected"}} @endif>Ativo</option>
            <option value="0" @if(isset($product) && $product->active == 0){{"selected"}} @endif>Inativo</option>
        </select>
    </div>
</div>
