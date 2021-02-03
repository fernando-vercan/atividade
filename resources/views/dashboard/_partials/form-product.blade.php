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
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <label for="active">Ativo:</label>
        <select class="form-control" name="active" id="active">
            <option value="">Selecione</option>
            <option value="1">Ativo</option>
            <option value="0">Inative</option>
        </select>
    </div>
</div>
