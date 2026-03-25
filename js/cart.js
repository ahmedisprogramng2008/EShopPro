// 1. تعريف مصفوفة السلة كمتغير عام لسهولة الوصول إليه من كل الدوال
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// 2. دالة تشغيل السلة عند تحميل أي صفحة
function initCart() {
    updateGlobalCartCount(); // تحديث رقم النافبار

    const tableBody = document.getElementById('cart-table-body');
    const subtotalEl = document.getElementById('cart-subtotal');
    const totalEl = document.getElementById('cart-grand-total');
    const emptyMsg = document.getElementById('empty-cart-msg');

    // إذا كنا في صفحة cart.php
    if (tableBody) {
        if (cart.length === 0) {
            tableBody.innerHTML = '';
            if (emptyMsg) emptyMsg.classList.remove('d-none');
            if (subtotalEl) subtotalEl.innerText = '0.00';
            if (totalEl) totalEl.innerText = '0.00';
        } else {
            if (emptyMsg) emptyMsg.classList.add('d-none');
            renderCartItems(tableBody, subtotalEl, totalEl);
        }
    }
}

// 3. دالة رسم المنتجات داخل جدول صفحة السلة
function renderCartItems(container, subtotalEl, totalEl) {
    let total = 0;
    container.innerHTML = cart.map(item => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;
        return `
            <tr>
                <td class="p-3"><strong>${item.name}</strong></td>
                <td class="p-3">$ ${item.price.toFixed(2)}</td>
                <td class="p-3 text-center">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, -1)">-</button>
                        <span class="btn border-secondary disabled text-dark" style="width:40px">${item.qty}</span>
                        <button class="btn btn-outline-secondary" onclick="updateQty(${item.id}, 1)">+</button>
                    </div>
                </td>
                <td class="p-3 fw-bold">$ ${itemTotal.toFixed(2)}</td>
                <td class="p-3 text-end">
                    <button class="btn btn-sm btn-danger rounded-pill" onclick="removeFromCart(${item.id})">Remove</button>
                </td>
            </tr>`;
    }).join('');

    if (subtotalEl) subtotalEl.innerText = total.toFixed(2);
    if (totalEl) totalEl.innerText = total.toFixed(2);
}

// 4. دالة إضافة منتج (تعمل من أي صفحة)
function addToCart(id, name, price) {
    // التأكد من جلب آخر نسخة من localStorage
    cart = JSON.parse(localStorage.getItem('cart')) || [];

    const existingItem = cart.find(item => item.id == id);

    if (existingItem) {
        existingItem.qty += 1;
    } else {
        cart.push({
            id: id,
            name: name,
            price: parseFloat(price),
            qty: 1
        });
    }

    saveAndReload();
    alert(`${name} added to cart! 🛒`);
}

// 5. دالة تعديل الكمية
window.updateQty = (id, change) => {
    const index = cart.findIndex(i => i.id == id);
    if (index > -1) {
        cart[index].qty += change;
        if (cart[index].qty < 1) cart.splice(index, 1);
        saveAndReload();
    }
};

// 6. دالة الحذف
window.removeFromCart = (id) => {
    cart = cart.filter(i => i.id != id);
    saveAndReload();
};

// 7. حفظ البيانات وتحديث الواجهة
function saveAndReload() {
    localStorage.setItem('cart', JSON.stringify(cart));
    initCart(); // يعيد رسم الجدول وتحديث العداد فوراً
}

// 8. تحديث العداد العلوي فقط
function updateGlobalCartCount() {
    const currentCart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalItems = currentCart.reduce((sum, item) => sum + item.qty, 0);
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.innerText = totalItems;
    }
}

// 9. الاستماع لضغطات أزرار الإضافة (Event Delegation)
document.addEventListener('click', function(e) {
    // بحث عن الزر أو أي عنصر داخله يحتوي على الكلاس المطلوب
    const btn = e.target.closest('.add-to-cart');
    if (btn) {
        const id = btn.getAttribute('data-id');
        const name = btn.getAttribute('data-name');
        const price = btn.getAttribute('data-price');
        addToCart(id, name, price);
    }
});

// 10. تشغيل السلة عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', initCart);