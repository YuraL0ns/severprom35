@extends('theme.default')
@section('content')

{{-- {{$category->count}}
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
    </ul> --}}


    <h1>{{$category->name}}</h1>
    <p>{{$category->description}}</p>
    @if ($category->children->isNotEpmty())
        <ul>
            @foreach ($category->children as $child )
                <li>
                    <a href="{{route('sait.category', ['code'=> $child->code])}}">{{$child->name}}</a>
                </li>
            @endforeach
        </ul>
    @endif

    @if ($category->products->isNotEmpty())
        @foreach ($category->products as $produt )
            <div>{{$product->name}}</div>
        @endforeach
    @endif

@endsection
