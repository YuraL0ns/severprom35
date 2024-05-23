@extends('templa.main')
@section('content')
Категория

@if ($subcategories->isNotEmpty())
    <ul>
        @foreach ($subcategories as $subchild )
            <li>
                <a href="{{route('sait.category', ['code' => $subchild->code])}}">{{$subchild->name}}</a>
            </li>
        @endforeach
    </ul>
@endif

@foreach ($products as $product )
    <div>{{$product->name}}</div>
@endforeach


@endsection
