{{-- resources/views/admin/pages/categories/listItem.blade.php --}}
<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center">
        <a data-toggle="collapse" href="#category-{{ $category->id }}" role="button" aria-expanded="false" aria-controls="category-{{ $category->id }}">
            {{ $category->name }}
        </a>
        <div>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info btn-xs">Редактировать</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-xs">Удалить</button>
            </form>
        </div>
    </div>
    @if ($category->children->isNotEmpty())
        <div class="collapse" id="category-{{ $category->id }}">
            <ul>
                @foreach ($category->children as $child)
                    @include('admin.pages.categories.listItem', ['category' => $child])
                @endforeach
            </ul>
        </div>
    @endif
</li>
