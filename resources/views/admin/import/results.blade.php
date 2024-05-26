@extends('admin.main')
@section('content')
<div class="container">
    <h1>Результаты импорта</h1>

    <h2>Добавленные товары</h2>
    <ul>
        @foreach ($addedProducts as $product)
        <li>{{ $product->name }} - {{ $product->article }}
            <ul>
                @foreach ($product->characteristics as $char)
                <li>{{ $char->name }}: {{ $char->value }}</li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>

    <h2>Обновленные товары</h2>
    <ul>
        @foreach ($updatedProducts as $product)
        <li>{{ $product->name }} - {{ $product->article }}
            <ul>
                @foreach ($product->characteristics as $char)
                <li>{{ $char->name }}: {{ $char->value }}</li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</div>
@endsection
