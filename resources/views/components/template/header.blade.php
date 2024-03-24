<section class="header">
    <div class="header-container header-wrapper">
        <div class="header-logo">
            <a class="header-logo-link" href="#">
                <img class="header-logo-link-images" src="{{ asset('images/logo/Logo_1.svg') }}" alt="{{ env('APP_NAME') }}">
                <div class="header-logo-link-text">Стройпромснаб
                    <span class="header-logo-link-text-span">
                        Грузоподъемное, сварочное, складское оборудование
                    </span>
                </div>

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
               @if (Auth::user())
                <a class="header-user-profile-link" href="#">
                    <img class="header-user-profile-link-images" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                </a>
                @else
                    <div class="header-user-profile-non">
                        <a class="header-user-profile-non-link" href="/login">Войти</a>
                        <a class="header-user-profile-non-link" href="/register">Регистрация</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

