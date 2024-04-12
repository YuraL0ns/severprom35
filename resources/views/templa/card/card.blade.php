@extends('templa.main')
@section('content')
    <div class="wrapper">

        <x-crowns/>

        <div class="item-card">
            <h1 class="item-card__header">Тележка платформенная пластиковая 250 кг TOR PH250P (800*500) со складной
                ручкой (резина 125мм)</h1>

            <div class="item-card__element row">

                <div class="item-card__slider">
                   <div class="slides">
                       <img class="slide" src="https://picsum.photos/600/600?random=1" alt="">
                       <img class="slide" src="https://picsum.photos/600/600?random=2" alt="">
                       <img class="slide" src="https://picsum.photos/600/600?random=3" alt="">
                       <img class="slide" src="https://picsum.photos/600/600?random=4" alt="">
                       <img class="slide" src="https://picsum.photos/600/600?random=5" alt="">
                   </div>
                    <div class="thumbnails">
                        <div class="thumb-box">
                            <img src="https://picsum.photos/600/600?random=1" class="thumb" data-index="0" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="https://picsum.photos/600/600?random=2" class="thumb" data-index="1" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="https://picsum.photos/600/600?random=3" class="thumb" data-index="2" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="https://picsum.photos/600/600?random=4" class="thumb" data-index="2" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="https://picsum.photos/600/600?random=5" class="thumb" data-index="2" alt="">
                        </div>
                    </div>
                </div>

                <div class="item-card__desc">
                    <div class="item-card__desc-order">
                        <p class="item-card__desc-order-art">Артикул: <span class="item-card__desc-order-art-span">123456789</span></p>
                        <h3 class="item-card__desc-order-header">
                            Цена: <span>123456 <span class="equ">&#8381;</span></span>
                        </h3>
                        <a class="item-card__desc-order-link" href="#">Добавить в корзину
                            <ion-icon name="basket"></ion-icon></a>
                    </div>
                    <div class="item-card__desc-support">
                        <div class="item-card__desc-support-item">Доставка в течении 7 дней</div>
                        <div class="item-card__desc-support-item">Гарантия возврата средств</div>
                        <div class="item-card__desc-support-item">Гарантия 3 года </div>
                        <div class="item-card__desc-support-item">Оплата любым способом</div>
                    </div>
                    <ul class="item-card__desc-list">
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Страна производитель</span>
                            <span class="item-card__desc-list-item-span">Россия <span class="fi fi-ru"></span></span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Бренд</span>
                            <span class="item-card__desc-list-item-span">TOR</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Год модельный</span>
                            <span class="item-card__desc-list-item-span">2024 г.</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Размеры (ш*в*г*д)мм</span>
                            <span class="item-card__desc-list-item-span">500*500*800*1500</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Материал</span>
                            <span class="item-card__desc-list-item-span">Пластик, резина</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Вес</span>
                            <span class="item-card__desc-list-item-span">50 кг</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Нагрузка</span>
                            <span class="item-card__desc-list-item-span">250 кг</span>
                        </li>

                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="item-card__group-btn">
                    <a class="item-card__group-btn-item" href="#card-one">Характеристика</a>
                    <a class="item-card__group-btn-item" href="#card-two">Отзывы</a>
                    <a class="item-card__group-btn-item" href="#card-three">Инструкции</a>
                </div>

                <div class="item-card__group-content">


                    <div class="item-card__group-content-area" id="card-one">
                        <table class="item-card__table">
                            <thead class="item-card__table-thead">
                            <tr class="item-card__table-thead-tr">
                                <th class="item-card__table-thead-tr-th">Название</th>
                                <th class="item-card__table-thead-tr-th">Значение</th>
                            </tr>
                            </thead>
                            <tbody class="item-card__table-tbody">
                                <tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr>
                                <tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr><tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr><tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr><tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr><tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">Название</td>
                                    <td class="item-card__table-tbody-tr-td">Значение</td>
                                </tr>






                            </tbody>
                        </table>
                    </div>
                    <div class="item-card__group-content-area" id="card-two">
                        2
                    </div>
                    {{--First block --}}
                    {{--First block --}}
                    <div class="item-card__group-content-area" id="card-three">
                        3
                    </div>
                    {{--First block --}}
                </div>
            </div>

        </div>

    </div>

    <div id="modal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modal-image">
        <div class="modal-caption"></div>
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
    </div>



@stop
