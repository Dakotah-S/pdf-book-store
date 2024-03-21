<?php
session_start();
include 'books.php';
// Check if the action is to add a book to the cart
if(isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Add the book to the cart
    if(isset($books[$id])) {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = array(
                'quantity' => 1,
                'price' => $books[$id]['price'],
                'title' => $books[$id]['title']
            );
        }
    }
    var_dump($_SESSION['cart']);
   
    // Redirect back to index page after adding to cart
    header('Location: ../index.php');
    exit;
}

// Check if the action is to remove a book from the cart
if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Remove the book from the cart
    if(isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']--;
        if($_SESSION['cart'][$id]['quantity'] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
    // Redirect back to cart page after removing from cart
    header('Location: cart.php');
    exit;
}

// Calculate cart subtotal, tax, and total
$subtotal = 0;
foreach ($_SESSION['cart'] as $id => $item) {
    $subtotal += $item['quantity'] * $item['price'];
}
$tax = 0.0825 * $subtotal; // Assuming tax rate is 10%
$total = $subtotal + $tax;
?>

<?php include"../assets/header.php"?>

<body>

<?php include"../assets/navbar.php" ?>
<?php include"../assets/hero.php" ?>

<div class="container">
           <h1 class="mt-5 mb-4">Shopping Cart</h1>
        <?php if(empty($_SESSION['cart'])): ?>
            <p>Your shopping cart is empty.</p>
        <?php else: ?>
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
                    <?php $index = 1; ?>
                    <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                        <tr>
                            <th scope="row"><?php echo $index++; ?></th>
                            <td><?php echo $item['title']; ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            <td>
                                <a href="cart.php?action=remove&id=<?php echo $id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Cart Summary</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal
                                <span>$<?php echo number_format($subtotal, 2); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tax
                                <span>$<?php echo number_format($tax, 2); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span>$<?php echo number_format($total, 2); ?></span>
                            </li>
                        </ul>
                        <a href="../views/checkout.php" class="btn btn-primary mt-2">Proceed to Checkout</a>
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