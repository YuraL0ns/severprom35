<nav class="navbar">
    <div class="navbar-container navbar-wrapper">

        <div class="contacts">
            <a class="contacts-link" href="#">
                <ion-icon name="call-outline"></ion-icon>
                {{ config('contacts.company_phone') }}
            </a>
            <a class="contacts-link" href="#">
                <ion-icon name="mail-outline"></ion-icon>
                {{ config('contacts.company_email') }}
            </a>
        </div>

        <div class="user">
            <a class="user-link" href="#"><ion-icon name="basket-outline"></ion-icon></a>
            <a class="user-link" href="#"><ion-icon name="man-outline"></ion-icon></a>
        </div>

    </div>
</nav>