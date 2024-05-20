@extends('templa.main')
@section('content')
Категории
   {{-- resources/views/categories/index.blade.php --}}
@foreach ($categories as $category)
<h1>{{ $category->name }}</h1>
@foreach ($category->children as $child)
    <h2>
        <a style="color: red;" href="{{ route('sait.category', ['code' => $child->code]) }}">{{ $child->name }}</a>
    </h2>
@endforeach
@endforeach



@endsection