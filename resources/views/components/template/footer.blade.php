<footer class="footer">
    <div class="footer-container footer-wrapper">
        <div class="footer-menu">
            <ul class="footer-menu-list">
                <li class="footer-menu-item">
                    <a class="footer-menu-item-link" href="#">Главная</a>
                </li>
                <li class="footer-menu-item">
                    <a class="footer-menu-item-link" href="#">Каталог</a>
                </li>
                <li class="footer-menu-item">
                    <a class="footer-menu-item-link" href="#">Доставка</a>
                </li>
                <li class="footer-menu-item">
                    <a class="footer-menu-item-link" href="#">Контакты</a>
                </li>
            </ul>
        </div>
        <div class="footer-contacts">
            <ul class="footer-contacts-list">
                <li class="footer-contacts-list-item">
                    <a href="#" class="footer-contacts-list-item-link">{{ config('contacts.company_phone') }}</a>
                </li>
                <li class="footer-contacts-list-item">
                    <a href="#" class="footer-contacts-list-item-link">{{ config('contacts.company_adres') }}</a>
                </li>
                <li class="footer-contacts-list-item">
                    <a href="#" class="footer-contacts-list-item-link">{{ config('contacts.company_email') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-container">
        <div class="footer-copy">
            &copy; 2014 - {{ date('Y') }}. Все права пренадлежат владельцам сайта, <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a>
        </div>
        <div class="footer-adteam">
            <span>Сайт разработан в студии <a href="#">Атмосфера</a></span>
        </div>
    </div>
</footer>
