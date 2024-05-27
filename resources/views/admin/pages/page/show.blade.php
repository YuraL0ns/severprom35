@extends('admin.main')

@section('content')
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->description }}</p>
    <div>{!! $page->content !!}</div>
@endsection
