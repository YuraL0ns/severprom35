@extends('theme.default')
@section('content')

{{$category->count}}
<h1>{{ $category->name }}</h1>
    <p>Description: {{ $category->description }}</p>
    <p>Category code: {{ $category->code }}</p>
    <h2>Products</h2>
    <ul>
        @foreach ($category->products as $product)
            <li>
                <a href="{{ route('products.show',[
                    'id' => $category->id, 
                    'article' => $product->article
                    ]) }}">{{ $product->name }}</a>
            </li>
        @endforeach
    </ul>

@endsection