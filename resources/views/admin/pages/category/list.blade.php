@extends('admin.main')
@section('content')

<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Тип</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if ($category->parent_code == null)
                            <span class="badge text-bg-danger">Категория родительская</span>
                        @else
                            <span class="badge text-bg-primary">Категория дочерняя</span>
                        @endif    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection