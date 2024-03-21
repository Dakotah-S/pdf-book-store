<?php include"../assets/header.php"?>

<body>

<?php include"../assets/navbar.php" ?>
<?php include"../assets/hero.php" ?>
    <div class="container">
        <h1 class="mt-5 mb-4">Shopping Cart</h1>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Cart Items -->
                        <tr>
                            <th scope="row">1</th>
                            <td>Book Title</td>
                            <td>$10.99</td>
                            <td>1</td>
                            <td>$10.99</td>
                            <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <!-- Repeat this row structure for each item in the cart -->
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal
                                <span>$10.99</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tax
                                <span>$1.00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span>$11.99</span>
                            </li>
                        </ul>
                        <button class="btn btn-primary btn-block mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <?php include"../assets/footer.php"?>

</body>
</html>
