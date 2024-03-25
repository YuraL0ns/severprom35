@extends('theme.default')
@section('content')
 @foreach ($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
        </li>
    @endforeach
@endsection