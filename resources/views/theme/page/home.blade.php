@extends('theme.default')
@section('content')

    <div class="category">
        <div class="category-wrapper">


            <div class="category-items">

                <ul style="column: 2;">
                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category) }}">
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
                </ul>

                {{-- <a class="category-item" href="#">
                    <img src="" alt="category-item-images">
                    <span class="category-item-name">Наименование категории</span>
                </a>

                <a class="category-item" href="#">
                    <img src="" alt="category-item-images">
                    <span class="category-item-name">Наименование категории</span>
                </a>

                <a class="category-item" href="#">
                    <img src="" alt="category-item-images">
                    <span class="category-item-name">Наименование категории</span>
                </a>

                <a class="category-item" href="#">
                    <img src="" alt="category-item-images">
                    <span class="category-item-name">Наименование категории</span>
                </a>

                <a class="category-item" href="#">
                    <img src="" alt="category-item-images">
                    <span class="category-item-name">Наименование категории</span>
                </a> --}}

            </div>

        </div>
    </div>

@endsection
