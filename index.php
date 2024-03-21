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
        

        <?php include"./assets/navbar.php" ?>
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
                            <a href="./assets/cart.php?action=add&id=<?php echo $book['id']; ?>" class="btn btn-outline-dark">Add To Cart</a>
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