@extends('templa.main')
@section('content')
    <div class="wrapper">
        <h1>Спасибо за заказ!</h1>
        <br>
        <p>Ваш номер заказа #{{$order->id}}. В ближайшее время менеджер свяяжется с Вами.</p>
    </div>
@endsection
