<?php
include 'include/db.php';
include 'include/header.php';
?>

<!-- Hero Section -->
<header class="bg-primary text-white py-5 mb-5 shadow" style="background: linear-gradient(45deg, #0d6efd, #0dcaf0);">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold">Latest Tech Trends in Your Hands</h1>
        <p class="lead">Shop now and get exclusive offers up to 40% OFF</p>
        <a href="shop.php" class="btn btn-light btn-lg mt-3 px-5 rounded-pill">Shop Now</a>
    </div>
</header>

<!-- Featured Products -->
<div class="container" id="products">
    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-3">
        <h2 class="fw-bold m-0">Featured Products</h2>
        <a href="shop.php" class="text-primary text-decoration-none fw-bold">View All →</a>
    </div>

    <div class="row g-4">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products LIMIT 8"); // Limit to 8 for Home Page
        if (mysqli_num_rows($res) > 0):
            while ($row = mysqli_fetch_assoc($res)): ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden product-card">
                        <a href="product-details.php?id=<?php echo $row['id']; ?>">
                            <img src="images/<?php echo $row['image']; ?>" class="card-img-top" style="height:200px; object-fit:cover;" alt="<?php echo $row['name']; ?>">
                        </a>
                        <div class="card-body text-center d-flex flex-column">
                            <h6 class="card-title text-truncate fw-bold"><?php echo $row['name']; ?></h6>
                            <p class="text-primary fw-bold mb-3">$ <?php echo number_format($row['price'], 2); ?></p>
                            <div class="mt-auto">
                                <button class="btn btn-primary add-to-cart"
                                    data-id="<?php echo $row['id']; ?>"
                                    data-name="<?php echo $row['name']; ?>"
                                    data-price="<?php echo $row['price']; ?>">
                                    Add to Cart 🛒
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        else: ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No products available at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }
</style>

<?php include 'include/footer.php'; ?>