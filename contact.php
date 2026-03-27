<?php
include 'include/db.php';
include 'include/header.php';
?>

<div class="container my-5 py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Get In Touch</h1>
        <p class="text-muted mx-auto" style="max-width: 600px;">
            Have a question or need help? Send us a message and our team will get back to you within 24 hours.
        </p>
    </div>

    <div class="row g-5">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-primary text-white">
                <h4 class="fw-bold mb-4">Contact Information</h4>

                <div class="d-flex align-items-center mb-4">
                    <div class="fs-3 me-3">📍</div>
                    <div>
                        <h6 class="mb-0 fw-bold">Address</h6>
                        <small>Cairo, Egypt - 123 Tech Street</small>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="fs-3 me-3">📞</div>
                    <div>
                        <h6 class="mb-0 fw-bold">Phone</h6>
                        <small>+20 123 456 789</small>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <div class="fs-3 me-3">📧</div>
                    <div>
                        <h6 class="mb-0 fw-bold">Email</h6>
                        <small>support@eshoppro.com</small>
                    </div>
                </div>

                <hr class="bg-white">

                <div class="mt-auto">
                    <h6 class="fw-bold mb-3">Follow Us</h6>
                    <div class="d-flex gap-3">
                        <span class="fs-4">Facebook</span> | <span class="fs-4">Twitter</span> | <span class="fs-4">Instagram</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <form id="contact-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control rounded-pill p-3" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control rounded-pill p-3" placeholder="Enter your email" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Subject</label>
                            <input type="text" class="form-control rounded-pill p-3" placeholder="How can we help?">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Message</label>
                            <textarea class="form-control rounded-4 p-3" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm">
                                Send Message 🚀
                            </button>
                        </div>
                    </div>
                </form>
                <div id="form-response" class="alert alert-success mt-3 d-none rounded-pill text-center">
                    Your message has been sent successfully!
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // "أكتفتي" بسيط لإبهار الدكتور: فورم شغال وهمياً بدون ريلود
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = this.querySelector('button');
        const response = document.getElementById('form-response');

        btn.innerHTML = 'Sending... ⏳';
        btn.disabled = true;

        setTimeout(() => {
            this.reset();
            btn.innerHTML = 'Send Message 🚀';
            btn.disabled = false;
            response.classList.remove('d-none');

            // إخفاء الرسالة بعد 4 ثواني
            setTimeout(() => response.classList.add('d-none'), 4000);
        }, 1500);
    });
</script>

<?php include 'include/footer.php'; ?>