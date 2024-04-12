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
                       <img class="slide" src="{{asset('images/item/images_2.png')}}" alt="">
                       <img class="slide" src="{{asset('images/item/images_3.png')}}" alt="">
                       <img class="slide" src="{{asset('images/item/images_4.jpg')}}" alt="">
                   </div>
                    <div class="thumbnails">
                        <div class="thumb-box">
                            <img src="{{asset('images/item/images_2.png')}}" class="thumb" data-index="0" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="{{asset('images/item/images_3.png')}}" class="thumb" data-index="1" alt="">
                        </div>
                        <div class="thumb-box">
                            <img src="{{asset('images/item/images_4.jpg')}}" class="thumb" data-index="2" alt="">
                        </div>
                    </div>
                </div>

                <div class="item-card__desc">
                    <div class="order">

                    </div>
                    <ul class="item-card__desc-list">
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
                        </li>
                        <li class="item-card__desc-list-item">
                            <span class="item-card__desc-list-item-span">1</span>
                            <span class="item-card__desc-list-item-span">2</span>
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
                    {{--First block --}}
                    {{-- Таблица с характеристиками --}}
                    {{-- Таблица с характеристиками --}}
                    <div class="item-card__group-content-area" id="card-one">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae culpa debitis deleniti dicta
                        dolorem, doloremque dolores ea earum eius est et eveniet impedit ipsa minima natus numquam odit
                        perspiciatis qui quia quidem quo recusandae reiciendis reprehenderit repudiandae sapiente sint
                        sunt temporibus unde ut. Accusamus aliquid, aspernatur consequatur, dignissimos esse et fugit
                        impedit iure labore natus neque obcaecati officia omnis quas quisquam recusandae rem repellat
                        repellendus saepe, sequi vero voluptas voluptatum. Autem consectetur culpa cumque cupiditate
                        dolor,
                        eaque esse illo impedit in ipsam ipsum iusto libero maiores maxime molestias nemo nisi quae quia
                        quidem quo repudiandae sapiente vel vero, vitae.
                    </div>
                    {{--First block --}}
                    {{--First block --}}
                    <div class="item-card__group-content-area" id="card-two">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae culpa debitis deleniti dicta
                        dolorem, doloremque dolores ea earum eius est et eveniet impedit ipsa minima natus numquam odit
                        perspiciatis qui quia quidem quo recusandae reiciendis reprehenderit repudiandae sapiente sint
                        sunt temporibus unde ut. Accusamus aliquid, aspernatur consequatur, dignissimos esse et fugit
                        impedit iure labore natus neque obcaecati officia omnis quas quisquam recusandae rem repellat
                        repellendus saepe, sequi vero voluptas voluptatum. Autem consectetur culpa cumque cupiditate
                        dolor,
                        eaque esse illo impedit in ipsam ipsum iusto libero maiores maxime molestias nemo nisi quae quia
                        quidem quo repudiandae sapiente vel vero, vitae.
                    </div>
                    {{--First block --}}
                    {{--First block --}}
                    <div class="item-card__group-content-area" id="card-three">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A beatae culpa debitis deleniti dicta
                        dolorem, doloremque dolores ea earum eius est et eveniet impedit ipsa minima natus numquam odit
                        perspiciatis qui quia quidem quo recusandae reiciendis reprehenderit repudiandae sapiente sint
                        sunt temporibus unde ut. Accusamus aliquid, aspernatur consequatur, dignissimos esse et fugit
                        impedit iure labore natus neque obcaecati officia omnis quas quisquam recusandae rem repellat
                        repellendus saepe, sequi vero voluptas voluptatum. Autem consectetur culpa cumque cupiditate
                        dolor,
                        eaque esse illo impedit in ipsam ipsum iusto libero maiores maxime molestias nemo nisi quae quia
                        quidem quo repudiandae sapiente vel vero, vitae.
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
