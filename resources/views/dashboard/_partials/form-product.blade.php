<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" name="name" id="name"
                value=" {{ $product->name ?? @old('name') }} ">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">Preço:</label>
            <input class="form-control" type="text" name="price" id="price"
                value=" {{ $product->price ?? @old('price') }} ">
        </div>
    </div>
    <div class="col-md-4">
        <label for="active">Ativo:</label>
        <input type="radio" name="active" id="active" value="1"><br>
        <label for="active">Inativo:</label>
        <input type="radio" name="active" id="active" value="0">
    </div>
</div>
