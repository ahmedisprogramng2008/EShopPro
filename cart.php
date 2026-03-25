<?php 
// 1. تأكد من أن المسارات صحيحة (include وليس includex)
include 'include/db.php'; 
include 'include/header.php'; 
?>

<div class="container my-5 py-5">
    <h2 class="fw-bold mb-4">Your Shopping Cart 🛒</h2>
    
    <div class="row g-4">
        <!-- Table of Products -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 p-3">Product</th>
                                <th class="border-0 p-3">Price</th>
                                <th class="border-0 p-3 text-center">Quantity</th>
                                <th class="border-0 p-3">Total</th>
                                <th class="border-0 p-3"></th>
                            </tr>
                        </thead>
                        <!-- هنا يتم حقن المنتجات بواسطة cart.js -->
                        <tbody id="cart-table-body">
                            <!-- التعبئة تلقائية -->
                        </tbody>
                    </table>
                </div>
                
                <!-- رسالة تظهر فقط إذا كانت السلة فارغة -->
                <div id="empty-cart-msg" class="text-center py-5 d-none">
                    <div class="fs-1 text-muted mb-3">🛒</div>
                    <h5>Your cart is empty</h5>
                    <p class="text-muted">Looks like you haven't added anything yet.</p>
                    <a href="shop.php" class="btn btn-primary btn-sm mt-3 px-4 rounded-pill">Shop Now</a>
                </div>
            </div>
            
            <div class="mt-4 d-flex justify-content-between align-items-center">
                <a href="shop.php" class="text-decoration-none text-primary fw-bold">
                    <i class="bi bi-arrow-left"></i> Continue Shopping
                </a>
                <!-- اختيار إضافي: زر لمسح السلة بالكامل -->
                <button onclick="clearFullCart()" class="btn btn-sm btn-link text-danger text-decoration-none">
                    Clear Shopping Cart
                </button>
            </div>
        </div>

        <!-- Order Summary Side Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-bold">$ <span id="cart-subtotal">0.00</span></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">Shipping</span>
                    <span class="text-success fw-bold">FREE</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4 fs-5">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold text-primary">$ <span id="cart-grand-total">0.00</span></span>
                </div>
                
                <!-- زر إتمام الشراء -->
                <a href="checkout.php" id="checkout-btn" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm">
                    PROCEED TO CHECKOUT
                </a>
                
                <div class="mt-4 p-3 bg-light rounded-3">
                    <p class="small text-muted mb-0">
                        <i class="bi bi-shield-lock-fill text-success"></i> Secure and encrypted checkout.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
// تصحيح المسار هنا من includex` إلى include
include 'include/footer.php'; 
?>

<!-- سكربت إضافي بسيط لمسح السلة بالكامل إذا أردت -->
<script>
function clearFullCart() {
    if(confirm('Are you sure you want to clear your cart?')) {
        localStorage.removeItem('cart');
        location.reload();
    }
}
</script>