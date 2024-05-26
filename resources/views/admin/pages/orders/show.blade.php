@extends('admin.main')
@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var orderId = '{{ $order->id }}';
        setupOrderEditListener(orderId);
        setupQuantityChangeListener(orderId);
        setupAddProductListener(orderId);
    });

    function setupOrderEditListener(orderId) {
        var saveOrderBtn = document.getElementById('save-order-btn');
        if (saveOrderBtn) {
            saveOrderBtn.addEventListener('click', function() {
                saveOrderChanges(orderId);
            });
        }
    }

    function saveOrderChanges(orderId) {
        const formData = new FormData(document.getElementById('order-info-form'));
        var orderId = '{{ $order->id }}';
        formData.append('_method', 'PATCH'); // Laravel трюк для эмуляции PATCH запроса
        fetch(`/dashboard/orders/${orderId}/update`, {
                method: 'POST', // Используем POST, но Laravel увидит это как PATCH из-за _method
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Информация о заказе обновлена успешно.');
                    location.reload();
                } else {
                    alert('Ошибка при сохранении изменений: ' + (data.message || 'неизвестная ошибка'));
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }


    function setupAddProductListener(orderId) {
        var addProductBtn = document.getElementById('add-product');
        var searchArticle = document.getElementById('search-article');

        if (addProductBtn) {
            addProductBtn.addEventListener('click', function() {
                var productId = document.getElementById('product-select').value;
                addProductToOrder(orderId, productId);
            });
        }

        if (searchArticle) {
            searchArticle.addEventListener('input', function(e) {
                var searchValue = e.target.value.toLowerCase();
                filterProductOptions(searchValue);
            });
        }
    }

    function addProductToOrder(orderId, productId) {
        fetch(`/dashboard/orders/${orderId}/add-product`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Товар добавлен в заказ!');
                    location.reload();
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }

    function filterProductOptions(searchValue) {
        var options = document.getElementById('product-select').options;
        for (let option of options) {
            let text = option.text.toLowerCase();
            option.style.display = text.includes(searchValue) ? 'block' : 'none';
        }
    }

    function updateQuantity(orderId, itemId, newQuantity) {
        fetch(`/dashboard/orders/${orderId}/update-item/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    quantity: newQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updatePriceDisplay(itemId, data.newTotal, data.orderTotal);
                } else {
                    console.error('Ошибка при обновлении количества');
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }

    function updatePriceDisplay(itemId, newTotal, orderTotal) {
    // Используем toLocaleString для форматирования чисел с двумя десятичными и разделением тысяч
        document.getElementById(`total-${itemId}`).innerText = newTotal.toLocaleString('ru-RU', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
        document.getElementById('order-total').innerText = orderTotal.toLocaleString('ru-RU', { minimumFractionDigits: 0, maximumFractionDigits: 2 });
    }

    function setupQuantityChangeListener(orderId) {
        // Получаем все инпуты для изменения количества товаров
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                // Получаем ID товара и новое количество из элемента input
                var itemId = this.getAttribute('data-item-id');
                var newQuantity = this.value;

                // Вызываем функцию обновления количества товара в заказе
                updateQuantity(orderId, itemId, newQuantity);
            });
        });
    }
</script>
    <div class="container" id="order-container" data-order-id="{{ $order->id }}">
        <h1>Заказ №{{ $order->id }} <span class="badge bg-primary">
            @if ($order->status == 'processing')
            В обработке
            @elseif ($order->status == 'shipped')
            Отправлен
            @elseif ($order->status == 'delivered')
            Доставлен
            @elseif ($order->status == 'cancelled')
            Отменён 
            @endif    
        </span></h1>

        <form class="my-4" action="{{ route('admin.orders.update_status', $order->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="status">Статус заказа:</label>
                <select class="form-control" id="status" name="status">
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>В обработке</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Отправлен</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Доставлен</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Отменён</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить статус</button>
        </form>
        

        <!-- Форма для редактирования информации заказа -->
        <form id="order-info-form" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="customer_name" class="form-label">Имя клиента</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name"
                    value="{{ $order->customer_name }}">
            </div>
            <div class="mb-3">
                <label for="customer_phone" class="form-label">Телефон клиента</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone"
                    value="{{ $order->customer_phone }}">
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Email клиента</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email"
                    value="{{ $order->customer_email }}">
            </div>
            <div class="mb-3">
                <label for="adress" class="form-label">Адрес</label>
                <input type="text" class="form-control" id="adress" name="adress" value="{{ $order->adress }}">
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Заметки</label>
                <input type="text" class="form-control" id="notes" name="notes" value="{{ $order->notes }}">
            </div>
            <button type="button" onclick="saveOrderChanges()" class="btn btn-primary">Сохранить изменения</button>
        </form>

        <!-- Поиск и добавление товаров -->
        <input type="text" id="search-article" class="form-control mb-2" placeholder="Поиск по артикулу...">
        <select id="product-select" class="form-select mb-2" size="5">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->article }} - {{ $product->name }}</option>
            @endforeach
        </select>
        <button id="add-product" class="btn btn-xs btn-success my-2">Добавить товар</button>

        <!-- Таблица товаров в заказе -->
        <table class="table">
            <thead>
                <tr>
                    <th>Артикул товара</th>
                    <th>Изображение</th>
                    <th>Наименование</th>
                    <th>Раздел</th>
                    <th>Кол-во</th>
                    <th>Цена за штуку</th>
                    <th>Общая цена</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->article }}</td>
                        <td><img src="{{ $item->product->main_image }}" alt="product-image" width="32" height="32">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->category->name }}</td>
                        <td>
                            <input type="number" class="form-control quantity-input" data-item-id="{{ $item->id }}"
                                value="{{ $item->quantity }}">
                        </td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td id="total-{{ $item->id }}">{{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
@endsection
