<style>
    .category-item {
    cursor: pointer;
}

.category-item ul {
    display: none;
    list-style-type: none;
    padding-left: 20px;
}

.category-item:hover > ul {
    display: block;
}
</style>
<li class="my-4 category-item">
    {{ $category->name }}
    <div class="btn-group">
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info">Редактировать</a>
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Вы уверены?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
        </form>
        <a href="{{ route('admin.categories.create', ['parent_id' => $category->id]) }}" class="btn btn-sm btn-success">Добавить подкатегорию</a>
    </div>
    @if ($category->children->isNotEmpty())
        <ul>
            @foreach ($category->children as $child)
                @include('admin.pages.categories.patrials.category', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
