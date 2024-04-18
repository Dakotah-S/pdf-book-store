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
    <div id="contentContainer">
        <!--Navbar start-->
            <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
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
                        </ul>
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
        <!--Navbar end-->

        <?php include"./assets/hero.php" ?>
    
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-fluid">
    <h1 class="mt-3 mb-3 ms-3">All Books</h1>
    <div class="row">
        <div class="col-md-2 border-end">
            <div class="ms-3">
                <!-- Button to toggle sidebar -->
                <a href="#" id="toggleSidebarBtn">Show Categories</a>
            </div>
            <!-- Content -->
            <div class="sidebar-content ms-3">
                <!-- Categories will be added here dynamically -->
            </div>
        </div>
        <div class="col-md-10">
            <div class="row" id="booksContainer">
                <!-- Books will be added here dynamically -->
            </div>
        </div>
    </div>
</div>

<script>document.addEventListener("DOMContentLoaded", function() {
    const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
    const sidebarContent = document.querySelector('.sidebar-content');
    const booksContainer = document.getElementById('booksContainer');
    const books = <?php echo json_encode($books); ?>;

    console.log(typeof books); // Check the type of 'books' variable

    // Check if 'books' is an object
    if (typeof books !== 'object' || books === null) {
        console.error('Error: Books data is not an object.');
        return;
    }

    let sidebarOpen = false;

    toggleSidebarBtn.addEventListener('click', function() {
        if (sidebarOpen) {
            // Close sidebar
            sidebarContent.innerHTML = '';
            sidebarOpen = false;
        } else {
            // Open sidebar and add categories
            sidebarContent.innerHTML = '';
            const categories = [
                { name: 'Travel', url: '/travel' },
                { name: 'Finance', url: '/finance' },
                { name: 'Stocks', url: '/stocks' },
                { name: 'Real Estate', url: '/real-estate' },
                { name: 'All', url: '/' }
            ];
            const categoriesList = document.createElement('ul');
            categories.forEach(category => {
                const listItem = document.createElement('li');
                const categoryLink = document.createElement('a');
                categoryLink.href = '#'; // Change href to '#' to prevent page reload
                categoryLink.textContent = category.name;
                // Add event listener to filter books by category when clicked
                categoryLink.addEventListener('click', function() {
                    updateCategoryTitle(category.name);
                    if (category.name === 'All') {
                        displayBooks(books);
                    } else {
                        const filteredBooks = filterBooksByCategory(books, category.name);
                        displayBooks(filteredBooks);
                    }
                });
                listItem.appendChild(categoryLink);
                categoriesList.appendChild(listItem);
            });
            sidebarContent.appendChild(categoriesList);
            sidebarOpen = true;
        }
    });

    function filterBooksByCategory(books, category) {
        const filteredBooks = [];
        for (const key in books) {
            if (books.hasOwnProperty(key) && books[key].category === category) {
                filteredBooks.push(books[key]);
            }
        }
        return filteredBooks;
    }

    function displayBooks(books) {
        booksContainer.innerHTML = '';
        for (const key in books) {
            if (books.hasOwnProperty(key)) {
                const book = books[key];
                const bookElement = document.createElement('div');
                bookElement.classList.add('col-md-4', 'mb-3');
                bookElement.innerHTML = `
                    <div class="card h-100" style="width: 18rem;">
                        <img src="./assets/image/${book.image}" class="card-img-top" alt="...">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">${book.title}</h5>
                                $${book.price}
                            </div>
                            <p class="card-text">${book.description}</p>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="./assets/cart.php?action=add&id=${book.id}" class="btn btn-outline-dark">Add to cart</a>
                                <a href="./views/product-page.php?id=${book.id}" class="btn btn-outline-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                `;
                booksContainer.appendChild(bookElement);
            }
        }
    }

    function updateCategoryTitle(categoryName) {
        const h1 = document.querySelector('.container-fluid h1');
        h1.textContent = categoryName + ' Books';
    }

    // Initially display all books
    displayBooks(books);
});

</script>

    </div>
        <?php include"./assets/footer.php"?>
</body>
</html>
