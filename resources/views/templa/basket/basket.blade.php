@extends('templa.main')
@section('content')
    <div class="wrapper">
        @if (session('cart') && count(session('cart')) > 0)
            <div style="text-align: right;">
                <a href="{{route('sait.order.checkout.form')}}">Оформить</a>
            </div>
        @endif
        @if(count($cart) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена за единицу</th>
                        <th>Общая цена</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item )
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['quantity'] ?? '0'}}</td>
                            <td>{{$item['price']}}</td>
                            <td>{{$item['price'] * $item['quantity']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="total">
                Итого: <strong>{{ array_sum(array_map(function($item){ return $item['price'] * $item['quantity']; }, $cart)) }} P</strong>
            </div>
            @else
            <p>Ваша корзина пуста</p>
        @endif
    </>
@endsection
