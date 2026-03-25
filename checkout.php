<?php include 'include/header.php'; ?>

<div class="container my-5">
    <div class="row g-5">
        <!-- Shipping Details Form -->
        <div class="col-md-7 shadow-sm p-4 bg-white rounded border-0">
            <h4 class="mb-4 fw-bold text-dark">Shipping Information</h4>
            <form id="checkoutForm">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label small fw-bold">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-bold">Email Address</label>
                        <input type="email" class="form-control" placeholder="example@email.com" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label small fw-bold">Detailed Address</label>
                        <input type="text" class="form-control" placeholder="Street, Building, Apartment No." required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">City</label>
                        <input type="text" class="form-control" placeholder="e.g. Cairo" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Phone Number</label>
                        <input type="tel" class="form-control" placeholder="+20 123 456 789" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4 py-3 fw-bold rounded-pill shadow-sm">CONFIRM ORDER</button>
            </form>
        </div>

        <!-- Order Summary Sidebar -->
        <div class="col-md-5">
            <div class="p-4 bg-light rounded border shadow-sm">
                <h5 class="fw-bold mb-4 text-primary d-flex align-items-center">
                    <span class="me-2">📦</span> Order Summary
                </h5>
                <div id="summary-items" class="mb-3">
                    <!-- Items will be injected here via JS if needed -->
                </div>
                <hr class="my-4">
                <div class="d-flex justify-content-between fs-4 fw-bold text-dark">
                    <span>Total:</span>
                    <span>$ <span id="checkout-total">0.00</span></span>
                </div>
                <p class="text-muted small mt-3">
                    <i class="bi bi-info-circle me-1"></i> No real payment required for this project.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const total = cart.reduce((s, i) => s + (i.price * i.qty), 0);
        document.getElementById('checkout-total').innerText = total.toFixed(2);
        
        // Optional: List items in the summary
        const summaryDiv = document.getElementById('summary-items');
        if(cart.length > 0) {
            summaryDiv.innerHTML = cart.map(item => `
                <div class="d-flex justify-content-between mb-2 small text-muted">
                    <span>${item.name} x ${item.qty}</span>
                    <span>$ ${(item.price * item.qty).toFixed(2)}</span>
                </div>
            `).join('');
        } else {
            summaryDiv.innerHTML = '<p class="text-muted small">Your cart is empty.</p>';
        }

        // Form Submit Alert
        document.getElementById('checkoutForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Thank you! Your order has been placed successfully.');
            localStorage.removeItem('cart'); // Clear cart after order
            window.location.href = 'index.php';
        });
    });
</script>

<?php include 'include/footer.php'; ?>