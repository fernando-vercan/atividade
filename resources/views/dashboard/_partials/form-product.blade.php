<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input class="form-control" type="text" name="name" value=" {{ $product->name ?? '' }} " required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Preço R$:</label>
            <input class="form-control money" type="text" name="price" value=" {{ $product->price ?? '' }} " required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="categories">Categorias:</label><br>
            <select class="form-control js-example-basic-multiple-limit" multiple name="categories_ids[]" required>
                <option value="">Selecione</option>

                @if (isset($product->categories))
                    @foreach ($product->categories as $category)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @endforeach
                @endif

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-md-3">
        <label for="active">Ativo:</label>
        <select class="form-control" name="active" required>
            <option value="">Selecione</option>
            <option value="1" @if (isset($product) && $product->active == 1) {{ 'selected' }} @endif>Ativo</option>
            <option value="0" @if (isset($product) && $product->active == 0) {{ 'selected' }} @endif>Inativo</option>
        </select>
    </div>
</div>
