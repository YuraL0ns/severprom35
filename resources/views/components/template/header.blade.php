<section class="header">

    <div class="header-container header-wrapper">
        <div class="logo">
            <a class="logo-link" href="{{ route('sait.home') }}">
            <img class="logo-link-images" src="{{ asset('images/logo.svg') }}" alt="{{ env("APP_NAME") }}"></a>
        </div>
    
        <div class="catalogs">
            <a class="catalogs-button" id="menu-button" href="#">
                <span>Каталог</span>
                <ion-icon name="apps"></ion-icon>
            </a>
    
            <div class="catalogs-menu" id="menu-container">
                <ul class="catalogs-menu-list">
                    <li class="catalogs-menu-list-item">
                        <a class="catalogs-menu-list-item-link" href="#">
                            <ion-icon name="barbell-outline"></ion-icon>
                            Грузоподъемное оборудование</a>
                            <ul class="catalogs-menu-list-item-sub">
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 1</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 2</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 3</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 4</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 5</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 6</a>
                                </li>
                                <li class="catalogs-menu-list-item-sub-item">
                                    <a class="catalogs-menu-list-item-sub-item-link" href="#">Предмет 7</a>
                                </li>
                            </ul>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a class="catalogs-menu-list-item-link" href="#">Складское оборудование</a>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a class="catalogs-menu-list-item-link" href="#">Тангажное оборудование</a>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a class="catalogs-menu-list-item-link" href="#">Автомобльное оборудование</a>
                    </li>
                </ul>
            </div>
    
        </div>
    
        <div class="menu">
            <ul class="menu-list">
                <li class="menu-list-item">
                    <a class="menu-list-item-link" href="{{ route('sait.home') }}">Главная</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-link" href="#">Оплата и доставка</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-link" href="#">Сервис и гарантия</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-link" href="#">О магазине</a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-item-link" href="#">Контакты</a>
                </li>
            </ul>
        </div>
    </div>

</section>