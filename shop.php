<?php 
include 'include/db.php'; 
include 'include/header.php'; 
?>

<!-- Ensure your header.php has <html lang="en" dir="ltr"> -->

<div class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2 class="fw-bold">All Products</h2>
            <p class="text-muted">Explore our wide range of premium products</p>
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Sort Filter -->
            <select class="form-select d-inline-block w-auto">
                <option>Newest First</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
            </select>
        </div>
    </div>

    <div class="row g-4">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products");
        if(mysqli_num_rows($res) > 0):
            while($row = mysqli_fetch_assoc($res)): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden product-card">
                    <div class="position-relative">
                        <img src="images/<?php echo $row['image']; ?>" class="card-img-top" style="height:220px; object-fit:cover;" alt="<?php echo $row['name']; ?>">
                        <div class="p-2 position-absolute top-0 end-0">
                            <span class="badge bg-primary">New</span>
                        </div>
                    </div>
                    <div class="card-body text-center d-flex flex-column">
                        <h6 class="card-title fw-bold text-dark mb-2"><?php echo $row['name']; ?></h6>
                        <p class="text-primary fw-bold mb-3 fs-5">$ <?php echo $row['price']; ?></p>
                        <div class="mt-auto">
                            <a href="product-details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark btn-sm w-100 mb-2 rounded-pill">Details</a>
                            <button class="btn btn-primary btn-sm w-100 rounded-pill add-to-cart" 
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
                <h3>No products found!</h3>
                <p class="text-muted">Please add products to the database to see them here.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    /* Professional Hover Effect */
    .product-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .product-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
</style>

<?php include 'include/footer.php'; ?>