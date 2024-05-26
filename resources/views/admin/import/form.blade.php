@extends('admin.main')
@section('content')

    <h1>Импорт данных XML</h1>
    
    <!-- Форма для загрузки XML файла -->
    {{-- <div class="card">
        <div class="card-header">
            Загрузить XML файл
        </div>
        <div class="card-body">
            <form action="{{ route('admin.dashboard.file') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="xml_file">Выберите XML файл:</label>
                    <input type="file" class="form-control" id="xml_file" name="xml_file">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Загрузить файл</button>
            </form>
        </div>
    </div> --}}
    
    <!-- Форма для ввода URL XML файла -->
    <div class="card mt-4">
        <div class="card-header">
            Загрузить XML из URL
        </div>
        <div class="card-body">
            <form action="{{ route('admin.dashboard.url') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="xml_url">Введите URL XML файла:</label>
                    <input type="text" class="form-control" id="xml_url" name="xml_url">
                </div>
                <div class="form-group">
                    <label for="data_type">Выберите тип данных:</label>
                    <select class="form-control" id="data_type" name="data_type">
                        <option value="categories">Категории и подкатегории</option>
                        <option value="products">Товары</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Загрузить по ссылке</button>
            </form>
        </div>
    </div>

@endsection
