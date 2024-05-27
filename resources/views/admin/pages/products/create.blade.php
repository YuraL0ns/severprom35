@extends('admin.main')

@section('content')
    <h1>Add New Product</h1>
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="categories_code">Category:</label>
            <select name="categories_code" id="categories_code" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->code }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="article">Article:</label>
            <input type="text" name="article" id="article" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="main_image">Main Image:</label>
            <input type="text" name="main_image" id="main_image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="wholesale_price">Wholesale Price:</label>
            <input type="number" step="0.01" name="wholesale_price" id="wholesale_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="currency">Currency:</label>
            <input type="text" name="currency" id="currency" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight:</label>
            <input type="number" step="0.01" name="weight" id="weight" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="length">Length:</label>
            <input type="number" step="0.01" name="length" id="length" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
            <input type="number" step="0.01" name="height" id="height" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="width">Width:</label>
            <input type="number" step="0.01" name="width" id="width" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="characteristics">Characteristics:</label>
            <input type="text" name="characteristics[0][name]" class="form-control" placeholder="Name">
            <input type="text" name="characteristics[0][value]" class="form-control" placeholder="Value">
            <input type="text" name="characteristics[1][name]" class="form-control" placeholder="Name">
            <input type="text" name="characteristics[1][value]" class="form-control" placeholder="Value">
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
@endsection
