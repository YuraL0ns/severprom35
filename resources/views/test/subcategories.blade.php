{{-- resources/views/category/partials/subcategories.blade.php --}}
@if ($subcategory->children->isNotEmpty())
    <ul>
        @foreach ($subcategory->children as $subchild)
            <li>
                <a href="{{ route('sait.category', ['code' => $subchild->code]) }}">{{ $subchild->name }}</a>
                {{-- Рекурсивный вызов для дальнейших подкатегорий --}}
                @include('test.subcategories', ['subcategory' => $subchild])
            </li>
        @endforeach
    </ul>
    
@endif
@foreach ($products as $product )
    {{$product->name}}
@endforeach
