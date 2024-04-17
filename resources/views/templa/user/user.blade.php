@extends('templa.main')
@section('content')
    <div class="wrapper">

        <div class="profile">
            <div class="profile_info">

                <div class="profile_info-avatar">
                    <img src="https://picsum.photos/450/450?random=1" alt="Иванов Иван Иванович">
                </div>

                <div class="profile_info-name">
                    Иванов Иван Иванович
                </div>

            </div>
            <div class="profile_options">

                <div class="profile-tabs">

                    <div class="profile-tabs-buttons">
                        <a href="#">Профиль</a>
                        <a href="#">Информация</a>
                        <a href="#">Заказы</a>
                    </div>


                    <div class="profile-tabs-content">
                        <div class="profile-tab">
                            Профиль
                        </div>
                        <div class="profile-tab">
                            Информация
                        </div>
                        <div class="profile-tab">
                            Заказы
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
