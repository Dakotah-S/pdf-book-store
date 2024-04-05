<?php
session_start();
$cartItemCount = 0;
if(isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartItemCount += $item['quantity'];
    }
}
?>
<?php include"./assets/books.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="./assets/css/style.css" rel="stylesheet" />
</head>
<body>
        
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Bookstore</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown link
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Shopping Cart -->
                    <div class="navbar-text ms-auto">
                        <a href="./assets/cart.php" class="btn btn-outline-dark">
                            <i class="fas fa-shopping-cart me-2"></i> Shopping Cart
                            <?php if ($cartItemCount > 0): ?>
                                <span class="badge bg-danger"><?php echo $cartItemCount; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
            </nav>

        <?php include"./assets/hero.php" ?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <div class="container">
        <h1 class="mt-5 mb-4"></h1>
        <div class="row">
            <?php foreach ($books as $book): ?>
            <div class="col-md-4">
                <div class="card h-100" style="width: 18rem;">
                    <img src="./assets/image/<?php echo $book['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?php echo $book['title']; ?></h5>
                            <?php echo "$" . $book['price']; ?>
                        </div>
                        <p class="card-text"><?php echo $book['description']; ?></p>       
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a href="./assets/cart.php?action=add&id=<?php echo $book['id']; ?>" class="btn btn-outline-dark">Add to cart</a>
                            <a href="./views/product-page.php?id=<?php echo $book['id']; ?>" class="btn btn-outline-dark">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
        <?php include"./assets/footer.php"?>
    </body>
</html>