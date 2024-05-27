{{-- create.blade.php или edit.blade.php --}}
@extends('admin.main')

@section('content')
<div class="container">
    <h2>{{ isset($category) ? 'Редактировать' : 'Добавить' }} категорию</h2>
    <form method="POST" action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Обновить' : 'Создать' }}</button>
    </form>
</div>
@endsection
