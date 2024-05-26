@extends('admin.main')
@section('content')
<div class="container">
    <h1>Список заказов</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table" id="ordersTable">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>ФИО</th>
                        <th>Телефон</th>
                        <th>Дата заказа</th>
                        <th>Общая сумма</th>
                        <th>Действия</th>
                    </tr>
                    <tr> <!-- Поля для поиска -->
                        <th><input type="text" id="searchOrderNumber" placeholder="Поиск по номеру..." class="form-control"></th>
                        <th><input type="text" id="searchName" placeholder="Поиск по ФИО..." class="form-control"></th>
                        <th><input type="text" id="searchPhone" placeholder="Поиск по телефону..." class="form-control"></th>
                        <th><input type="text" id="searchDate" placeholder="Поиск по дате..." class="form-control"></th>
                        <th><input type="text" id="searchTotal" placeholder="Поиск по сумме..." class="form-control"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_phone }}</td>
                        <td>{{ $order->created_at->format('d.m.Y') }}</td>
                        <td>{{ $order->total }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Просмотр</a>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Изменить</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('ordersTable');
        const inputs = table.querySelectorAll('thead tr:nth-child(2) input[type="text"]');
    
        inputs.forEach(input => {
            input.addEventListener('keyup', function() {
                const index = input.parentElement.cellIndex;
                const searchTerm = input.value.toLowerCase();
    
                table.querySelectorAll('tbody tr').forEach(row => {
                    const cell = row.cells[index].textContent.toLowerCase();
                    row.style.display = cell.includes(searchTerm) ? '' : 'none';
                });
            });
        });
    });
    </script>
    
@endsection
