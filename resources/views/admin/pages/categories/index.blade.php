@extends('admin.main')

@section('content')
<div class="container">
    <div id="tree"></div>
</div>

<div id="editModal" style="display:none;">
    <h2>Редактировать категорию</h2>
    <form id="editForm">
        <input type="hidden" id="editCategoryId">
        <label for="editCategoryName">Название категории:</label>
        <input type="text" id="editCategoryName" required>
        <button type="submit">Сохранить</button>
    </form>
</div>

@endsection
