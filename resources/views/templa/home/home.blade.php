@extends('templa.main')
@section('content')
    <section class="main">
        <div class="main-wrapper wrapper">
            <div class="navbar">
                <ul class="navbar-list">

                    @foreach ($mainCategories as $categories)
                        <li class="navbar-list__item">
                            <a href="{{route('sait.category', $categories->code)}}" class="navbar-list__item-link">
                                <ion-icon name="copy-outline"></ion-icon>
                                {{ $categories->name }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>


            <div>



            </div>

            <div class="rated">
                <x-templa.card-rated />
                <x-templa.card-rated />
                <x-templa.card-rated />
            </div>
        </div>
    </section>

    <section class="area">
        <div class="area-wrapper wrapper">
            <h1 class="area-header">Товары</h1>
        </div>
        <div class="area-wrapper wrapper">

            <div class="card-grid">
                @foreach ($products as $product)
                    <x-templa.card name="{{ $product->name }}" img="{{ $product->main_image }}"
                        altImg="{{ $product->name }}" article="{{ $product->article }}" price="{{ $product->price }}"
                        url="{{ route('sait.product', $product) }}" />
                @endforeach


            </div>

        </div>
    </section>
@endsection
