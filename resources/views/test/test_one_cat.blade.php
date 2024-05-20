@extends('templa.main')
@section('content')

<div class="area">
    <div class="area-wrapper wrapper">
        <div class="first_block">
            <ul>
                @foreach ($subcategories as $subcategory)
                    <li>
                        <a href="{{ route('sait.category', ['code' => $subcategory->code]) }}">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="horizontal_line"></div>
        <div class="second_block">
            
            @foreach ($products as $product)
                <div class="product">
                    <a href="{{ route('sait.product', ['id' => $product->id]) }}" class="block_product">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                        <h3>{{ $product->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

{{--  --}}