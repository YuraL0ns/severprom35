@extends('admin.main')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="categories_code">Category:</label>
            <select name="categories_code" id="categories_code" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->code }}" {{ $category->code == $product->categories_code ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="article">Article:</label>
            <input type="text" name="article" id="article" class="form-control" value="{{ $product->article }}" required>
        </div>
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $product->url }}" required>
        </div>
        <div class="form-group">
            <label for="main_image">Main Image:</label>
            <input type="text" name="main_image" id="main_image" class="form-control" value="{{ $product->main_image }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="wholesale_price">Wholesale Price:</label>
            <input type="number" step="0.01" name="wholesale_price" id="wholesale_price" class="form-control" value="{{ $product->wholesale_price }}" required>
        </div>
        <div class="form-group">
            <label for="currency">Currency:</label>
            <input type="text" name="currency" id="currency" class="form-control" value="{{ $product->currency }}" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" step="0.01" name="weight" id="weight" class="form-control" value="{{ $product->weight }}" required>
        </div>
        <div class="form-group">
            <label for="length">Length:</label>
            <input type="number" step="0.01" name="length" id="length" class="form-control" value="{{ $product->length }}" required>
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" step="0.01" name="height" id="height" class="form-control" value="{{ $product->height }}" required>
        </div>
        <div class="form-group">
            <label for="width">Width:</label>
            <input type="number" step="0.01" name="width" id="width" class="form-control" value="{{ $product->width }}" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $product->unit }}" required>
        </div>
        <div class="form-group">
            <label for="characteristics">Characteristics:</label>
            @foreach ($product->characteristics as $characteristic)
                <input type="text" name="characteristics[{{ $loop->index }}][name]" class="form-control" value="{{ $characteristic->name }}" placeholder="Name">
                <input type="text" name="characteristics[{{ $loop->index }}][value]" class="form-control" value="{{ $characteristic->value }}" placeholder="Value">
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
