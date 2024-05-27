@extends('templa.main')
@section('content')
<style>
    figure.image {
        width: 100%;
    }
    figure.image > img {
        width: 100%;
    }
</style>
<section class="area">
    <div class="wrapper">
        <h1>{{ $page->title }}</h1>
        <p>{{ $page->description }}</p>
        <div>{!! $page->content !!}</div>
    </div>
</section>
@endsection
