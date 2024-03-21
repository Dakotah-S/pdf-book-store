<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookstore - Product Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>

<?php include"../assets/navbar.php" ?>
<?php include"../assets/header.php" ?>

<!-- Product Details -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <img src="https://via.placeholder.com/400" alt="Book Cover" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2 class="mb-4">Book Title</h2>
      <p><strong>Author:</strong> Author Name</p>
      <p><strong>Category:</strong> Nonfiction</p>
      <p><strong>Price:</strong> $40.00</p>
      <p><strong>Description:</strong></p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Vestibulum condimentum eros vitae tortor maximus, sed vehicula eros pulvinar.</p>
      <button class="btn btn-primary"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
    </div>
  </div>
</div>


<!-- Bootstrap JS and Font Awesome JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>


<?php include"../assets/footer.php"?>
</body>
</html>
