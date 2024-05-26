document.addEventListener('DOMContentLoaded', function () {
    console.log('Document Loaded');

    var orderId = document.getElementById('order-container').getAttribute('data-order-id');
    console.log('Order ID:', orderId);

    var addProductBtn = document.getElementById('add-product-to-order');
    console.log('Add product button:', addProductBtn);

    var searchArticle = document.getElementById('search-article');
    console.log('Search article input:', searchArticle);

    if (addProductBtn) {
        addProductBtn.addEventListener('click', function () {
            var productId = document.getElementById('product-select').value;
            addProductToOrder(orderId, productId);
        });
    }

    if (searchArticle) {
        searchArticle.addEventListener('input', function (e) {
            var searchValue = e.target.value.toLowerCase();
            filterProductOptions(searchValue);
        });
    }

    setupQuantityChangeListener(orderId);
    setupOrderEditListener(orderId);
});

function setupQuantityChangeListener(orderId) {
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            var itemId = this.getAttribute('data-item-id');
            var newQuantity = this.value;
            updateQuantity(orderId, itemId, newQuantity);
        });
    });
}

function setupOrderEditListener(orderId) {
    var saveOrderBtn = document.getElementById('save-order-btn');
    if (saveOrderBtn) {
        saveOrderBtn.addEventListener('click', function () {
            saveOrderChanges(orderId);
        });
    }
}

function addProductToOrder(orderId, productId) {
    fetch(`/dashboard/orders/${orderId}/add_product`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ productId })
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
        body: JSON.stringify({ quantity: newQuantity })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById(`total-${itemId}`).innerText = data.newTotal.toFixed(2);
                document.getElementById('order-total').innerText = data.orderTotal.toFixed(2);
            } else {
                console.error('Ошибка при обновлении количества');
            }
        })
        .catch(error => console.error('Ошибка:', error));
}

function saveOrderChanges(orderId) {
    const formData = new FormData(document.getElementById('order-info-form'));
    fetch(`/dashboard/orders/${orderId}/update`, {
        method: 'POST',
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
                alert('Ошибка при сохранении изменений.');
            }
        })
        .catch(error => console.error('Ошибка:', error));
}
