<section class="header">
    <div class="header-container">
        <div class="header-logo">
            <a href="#">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ env('APP_NAME') }}">
            </a>
        </div>
        <div class="header-menu">
            <ul class="header-menu-list">
                <li class="header-menu-list-item">
                    <a href="#" class="header-menu-list-item-link">
                        Главная
                    </a>
                </li>
                <li class="header-menu-list-item">
                    <a href="#" class="header-menu-list-item-link">
                        Каталог
                    </a>
                </li>
                <li class="header-menu-list-item">
                    <a href="#" class="header-menu-list-item-link">
                        Доставка
                    </a>
                </li>
                <li class="header-menu-list-item">
                    <a href="#" class="header-menu-list-item-link">
                        Контакты
                    </a>
                </li>
            </ul>
        </div>
        <div class="header-user">
            <div class="header-user-basket">
                <a href="#" title="User Basket">
                    <ion-icon name="basket"></ion-icon>
                </a>
            </div>
            <div class="header-user-profile">
               @if (Auth::user() == 1)
                <a href="#">
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                </a>
               @endif
            </div>
        </div>
    </div>
</section>
