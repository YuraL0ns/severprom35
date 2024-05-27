{{-- resources/views/admin/pages/categories/create.blade.php --}}
@extends('admin.main')

@section('content')
<div class="container">
    <h1>Создать категорию</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Название категории</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
</div>
@endsection
