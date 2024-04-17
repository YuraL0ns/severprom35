@php
    $pageName = 'Регистрация нового пользователя';
@endphp
@extends('templa.auth.theme')
@section('page_title', $pageName)
@section('form_name', $pageName)


@section('content')
<form class="user-register-form" method="post" action="">

    <div class="user-register-form-row">
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" id="phone" class="form-input" placeholder="Номер телефона">
    </div>

    <div class="user-register-form-row">
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" id="phone" class="form-input" placeholder="Номер телефона">
    </div>

    <div class="user-register-form-row">
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" id="phone" class="form-input" placeholder="Номер телефона">
    </div>

    <div class="user-register-form-row">
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" id="phone" class="form-input" placeholder="Номер телефона">
    </div>

    <div class="user-register-form-row">
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" id="phone" class="form-input" placeholder="Номер телефона">
    </div>

    <div class="user-register-form-row">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" class="form-input" placeholder="Ваш пароль">
    </div>

    <div class="user-register-form-row">
        <label class="remember" for="remember-me">
            <input type="checkbox" name="remember-me" id="remember-me" class="form-input">Запомнить меня?</label>
    </div>

    <div class="user-register-form-row">
        <button class="user-login-form-button" type="submit">Войти</button>
    </div>
</form>
@stop

