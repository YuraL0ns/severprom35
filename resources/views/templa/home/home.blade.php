@extends('templa.main')
@section('content')
    <section class="main">
        <div class="main-wrapper wrapper">
            <div class="navbar">
                <ul class="navbar-list">
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            icon
                            Грузоподъемное оборудование
                        </a>
                    </li>
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            icon
                            Грузоподъемное оборудование
                        </a>
                    </li>
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            icon
                            Грузоподъемное оборудование
                        </a>
                    </li>
                    <li class="navbar-list__item">
                        <a class="navbar-list__item-link" href="#">
                            icon
                            Грузоподъемное оборудование
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
@endsection
