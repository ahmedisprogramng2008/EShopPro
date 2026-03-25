<?php 
include 'include/db.php'; 
include 'include/header.php';

// Get Product ID from URL
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$p = mysqli_fetch_assoc($result);
?>

<div class="container my-5 py-5 bg-white rounded shadow-sm">
    <div class="row align-items-center">
        <!-- Product Image -->
        <div class="col-md-6 text-center">
            <img src="images/<?php echo $p['image']; ?>" class="img-fluid rounded shadow" style="max-height: 450px; object-fit: cover;">
        </div>

        <!-- Product Info -->
        <div class="col-md-6 px-lg-5">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop.php">Products</a></li>
                    <li class="breadcrumb-item active text-truncate" style="max-width: 150px;"><?php echo $p['name']; ?></li>
                </ol>
            </nav>

            <h1 class="fw-bold mb-3"><?php echo $p['name']; ?></h1>
            <h3 class="text-primary mb-4 fw-bold">$ <?php echo number_format($p['price'], 2); ?></h3>
            
            <div class="mb-4">
                <h6 class="fw-bold">Description:</h6>
                <p class="text-muted lh-lg"><?php echo $p['description']; ?></p>
            </div>

            <hr class="my-4">

            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg px-5 add-to-cart" 
                        data-id="<?php echo $p['id']; ?>" 
                        data-name="<?php echo $p['name']; ?>" 
                        data-price="<?php echo $p['price']; ?>">
                    <i class="bi bi-cart-plus me-2"></i> Add to Cart 🛒
                </button>
                <a href="shop.php" class="btn btn-outline-secondary">Back to Shop</a>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>