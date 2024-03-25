<section class="header">

    <div class="header-container header-wrapper">
        <div class="logo">
            <a href="{{ route('sait.home') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="{{ env("APP_NAME") }}"></a>
        </div>
    
        <div class="catalogs">
            <a href="#">
                <span>Каталог</span>
                <ion-icon name="menu"></ion-icon>
            </a>
    
            <div class="catalogs-menu">
                <ul class="catalogs-menu-list">
                    <li class="catalogs-menu-list-item">
                        <a href="#">Грузоподъемное оборудование</a>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a href="#">Складское оборудование</a>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a href="#">Тангажное оборудование</a>
                    </li>
                    <li class="catalogs-menu-list-item">
                        <a href="#">Автомобльное оборудование</a>
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