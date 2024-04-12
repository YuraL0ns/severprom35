@extends('templa.main')
@section('content')
    <section class="main">
        <div class="main-wrapper wrapper">
            <div class="navbar">
                <ul class="navbar-list">
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            <ion-icon name="copy-outline"></ion-icon>
                            Грузоподъемное оборудование
                        </a>
                    </li>
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            <ion-icon name="copy-outline"></ion-icon>
                            Складское оборудование
                        </a>
                    </li>

                </ul>
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
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
                <x-templa.card />
            </div>

        </div>
    </section>
@endsection
