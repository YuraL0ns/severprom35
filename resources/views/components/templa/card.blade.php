{{-- <div class="card-box">
    <img class="card-box__images" src="{{asset('images/item/images_1.jpeg')}}" alt="card item">
    <h3 class="card-box__header">Тележка платформенная пластиковая 250 кг TOR PH250P (800*500) со складной ручкой (резина 125мм)</h3>
    <small class="card-box__article">Артикул: 10425347</small>
    <div class="card-box__desc">
        <div class="card-box__desc-item">
            <span class="card-box__desc-item-name">Страна</span>
            <span class="card-box__desc-item-value">Россия</span>
        </div>
        <hr>
        <div class="card-box__desc-item">
            <span class="card-box__desc-item-name">Материал</span>
            <span class="card-box__desc-item-value">Пластик</span>
        </div>
        <hr>
        <div class="card-box__desc-item">
            <span class="card-box__desc-item-name">Грузоподъемность</span>
            <span class="card-box__desc-item-value">250 кг</span>
        </div>
        <hr>
        <div class="card-box__desc-item">
            <span class="card-box__desc-item-name">Ширина платформы</span>
            <span class="card-box__desc-item-value">800 мм</span>
        </div>
    </div>
    <div class="card-box__price">
        <h3 class="card-box__price-header">125786 Р</h3>
        <a class="card-box__price-btn" href="">Подробнее</a>
    </div>
</div> --}}

<div class="card-box">
    
    <div class="card-box__images-box">
        <img src="{{ asset($img) }}" alt="{{ $altImg }}">
    </div>
    <h3 class="card-box__header">{{ $name }}</h3>
    <small class="card-box__article">Артикул: {{ $article }}</small>
    <div class="card-box__desc">
       
    </div>
    <div class="card-box__price">
        <h3 class="card-box__price-header">{{ $price }} Р</h3>
        <a class="card-box__price-btn" href="{{ $url }}">Подробнее</a>
    </div>
</div>
