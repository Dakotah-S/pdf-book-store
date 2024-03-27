
<?php include"../assets/books.php"?>
<?php include"../assets/header.php"?>

<body>

<?php include"../assets/navbar.php" ?>
<?php include"../assets/hero.php" ?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    foreach ($books as $book){
        if ($book["id"] == $id){
            $book_id = $book['id'];
            $book_title = $book['title'];
            $book_price = $book['price'];
            $book_image = $book['image'];
            $book_description = $book['description'];
        }
    }
}
?>

<!-- Product Details -->
<div class="container my-5">
  <div class="row">
    <div class="col-md-6">
      <img src="../assets/image/<?php echo $book_image;?>" alt="Book Cover" class="img-fluid">
    </div>
    <div class="col-md-6">
      <h2 class="mb-4"><?php echo $book_title; ?></h2>
      <p><strong>Author:</strong> Author Name</p>
      <p><strong>Category:</strong> Nonfiction</p>
      <p><strong>Price:</strong> <?php echo $book_price; ?></p>
      <p><strong>Description:</strong></p>
      <p><?php echo $book_description; ?></p>
      <a href="../assets/cart.php?action=add&id=<?php echo $book_id; ?>" class="btn btn-primary">Add to cart</a>

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
