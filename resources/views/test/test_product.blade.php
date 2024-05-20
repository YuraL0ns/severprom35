@extends('templa.main')
@section('content')



    <div class="wrapper">
        <div class="item-card">
            <h1 class="item-card__header">{{$product->name}}</h1>
            <div class="item-card__element row">
                <div class="item-card__slider">
                    <div class="slides">
                        <img class="slide" src="{{$product->main_image}}" alt="">
                        <img class="slide" src="https://picsum.photos/600/600?random=2" alt="">
                        <img class="slide" src="https://picsum.photos/600/600?random=3" alt="">
                        <img class="slide" src="https://picsum.photos/600/600?random=4" alt="">
                        <img class="slide" src="https://picsum.photos/600/600?random=5" alt="">
                    </div>
                     <div class="thumbnails">
                         <div class="thumb-box">
                             <img src="{{$product->main_image}}" class="thumb" data-index="0" alt="{{$product->name}}">
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
                        <p class="item-card__desc-order-art">Артикул: <span class="item-card__desc-order-art-span">{{$product->article}}</span></p>
                        <h3 class="item-card__desc-order-header">
                            Цена: <span>{{$product->price}} <span class="equ">&#8381;</span></span>
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
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusMaker as $bm )
                                    {{$bm->value}}
                                @endforeach
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Бренд</span>
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusBrand as $bb )
                                    {{$bb->value}}
                                @endforeach
                            </span>
                        </li>
                    
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">@foreach ($product->bonusSize as $bs )
                                {{$bs->name}}
                            @endforeach</span>
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusSize as $bs )
                                    {{$bs->value}}
                                @endforeach</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">@foreach ($product->bonusBoxSize as $bbs )
                                {{$bbs->name}}
                            @endforeach</span>
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusBoxSize as $bbs )
                                    {{$bbs->value}}
                                @endforeach</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Материал</span>
                            <span class="item-card__desc-list-item-span">Пластик, резина</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Вес</span>
                           
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusWih as $bw )
                                    {{$bw->value}} кг
                                @endforeach</span>
                            </span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">Нагрузка</span>
                            <span class="item-card__desc-list-item-span">
                                @foreach ($product->bonusWiegth as $bw )
                                    {{$bw->value}} т</span> </span>
                                @endforeach
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="item-card__group-btn">
                    <a class="item-card__group-btn-item" href="#card-one">Характеристики</a>
                    {{-- <a class="item-card__group-btn-item" href="#card-two">Отзывы</a>
                    <a class="item-card__group-btn-item" href="#card-three">Инструкции</a> --}}
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
                                @foreach ($product->characteristics as $characteristic)
                                <tr class="item-card__table-tbody-tr">
                                    <td class="item-card__table-tbody-tr-td">{{$characteristic->name}}</td>
                                    <td class="item-card__table-tbody-tr-td">{{$characteristic->value}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="item-card__group-content-area" id="card-two">
                        2
                    </div>
                    <div class="item-card__group-content-area" id="card-three">
                        3
                    </div> --}}
                </div>
            </div>
    </div>

@endsection