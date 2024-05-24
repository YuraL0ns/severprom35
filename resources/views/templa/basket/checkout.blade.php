@extends('templa.main')
@section('content')
    <div class="wrapper">
        <h3>Оформление заказа</h3>
        <form action="{{route('sait.order.checkout')}}" method="post">
            @csrf
            <div class="form-row">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-row">
                <label for="adress">Адрес</label>
                <input type="text" id="adress" name="adress">
            </div>
            <div class="form-row">
                <label for="phone">Телефон</label>
                <input type="text" id="phone" name="phone">
            </div>
            <div class="form-row">
                <label for="email">email</label>
                <input type="text" id="email" name="email">
            </div>
            <div class="form-row">
                <label for="notes">Заметка</label>
                <input type="text" id="notes" name="notes">
            </div>

            <button type="submit">оформить заказ</button>
        </form>
    </div>
@endsection
