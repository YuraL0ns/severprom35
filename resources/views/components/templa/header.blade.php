<section class="header">
    <div class="header-wrapper wrapper">

        <div class="logo">
            <a href="{{route('sait.home')}}">
                <img src="{{asset('images/logo/logo-new.svg')}}" alt="Logo">
            </a>
        </div>

        <div class="menu">
            <ul class="menu-list">
                <li class="menu-list__item">
                    <a class="menu-list__item-link" href="#">Главная</a>
                </li>
                <li class="menu-list__item">
                    <a class="menu-list__item-link" href="#">Гарантия</a>
                </li>
                <li class="menu-list__item">
                    <a class="menu-list__item-link" href="#">Доставка и оплата</a>
                </li>
                <li class="menu-list__item">
                    <a class="menu-list__item-link" href="#">Контакты</a>
                </li>
            </ul>
        </div>

        <div class="user">

            <a href="{{route('sait.profile')}}">
                <ion-icon name="person"></ion-icon>
            </a>

            <a href="{{route('sait.basket')}}">
                <ion-icon name="basket"></ion-icon>
            </a>

        </div>

    </div>
</section>
