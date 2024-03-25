@extends('theme.default')
@section('content')





    {{ $product->name }}
    {{ $product->article }}
    <a href="{{ $product->url }}">Link</a>

    <img src="{{ $product->main_image }}" alt="">

        <table border="2">
            @foreach ($product->characteristics as $item)
       <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->value }}</td> 
       </tr>
    @endforeach
        </table>
    @endsection