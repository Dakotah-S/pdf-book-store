<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Bookstore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <!--<li class="nav-item">
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
                </li>-->
            </ul>
        </div>
        <!-- Shopping Cart -->
        <div class="navbar-text ms-auto">
            <?php
            $cartItemCount = 0;
            if(isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $cartItemCount += $item['quantity'];
                }
            }
            ?>
            <a href="./assets/cart.php" class="btn btn-outline-dark">
                <i class="fas fa-shopping-cart me-2"></i> Shopping Cart
                <?php if ($cartItemCount > 0): ?>
                    <span class="badge bg-danger"><?php echo $cartItemCount; ?></span>
                <?php endif; ?>
            </a>
        </div>

    </div>
</nav>
