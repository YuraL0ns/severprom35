<nav class="navbar">
    <div class="navbar-container navbar-wrapper">
        <div class="navbar-phone">
            <a href="#">
                <ion-icon name="call"></ion-icon>
                {{ config('contacts.company_phone') }}
            </a>
            <a href="#">
                <ion-icon name="call"></ion-icon>
                {{ config('contacts.company_phone') }}
            </a>
        </div>
        <div class="navbar-email">
            <a href="#">
                <ion-icon name="mail"></ion-icon>
                {{ config('contacts.company_email') }}
            </a>
        </div>
        <div class="navbar-adres">
            <a href="#">
                <ion-icon name="map"></ion-icon>
                {{ config('contacts.company_adres') }}
            </a>
        </div>
    </div>
</nav>
