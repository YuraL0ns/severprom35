@extends('admin.main')

@section('content')
    <h1>Product Details</h1>
    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Article:</strong> {{ $product->article }}</p>
    <p><strong>URL:</strong> <a href="{{ $product->url }}" target="_blank">{{ $product->url }}</a></p>
    <p><strong>Main Image:</strong> <img src="{{ $product->main_image }}" alt="Main Image" style="width: 100px;"></p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Wholesale Price:</strong> {{ $product->wholesale_price }}</p>
    <p><strong>Currency:</strong> {{ $product->currency }}</p>
    <p><strong>Weight:</strong> {{ $product->weight }}</p>
    <p><strong>Length:</strong> {{ $product->length }}</p>
    <p><strong>Height:</strong> {{ $product->height }}</p>
    <p><strong>Width:</strong> {{ $product->width }}</p>
    <p><strong>Unit:</strong> {{ $product->unit }}</p>
    <h3>Characteristics</h3>
    <ul>
        @foreach ($product->characteristics as $characteristic)
            <li><strong>{{ $characteristic->name }}:</strong> {{ $characteristic->value }}</li>
        @endforeach
    </ul>
@endsection
