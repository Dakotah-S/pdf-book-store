<style>

.sidebar-content {
  width: 200px; /* Adjust the width as needed */
  background-color: white;
  padding: 10px;
  border-radius: 5px;
}

.sidebar-content ul {
  list-style-type: none;
  padding: 0;
}

.sidebar-content ul li {
  padding: 5px 0;
  border-bottom: 1px solid #ddd;
}

.sidebar-content ul li:last-child {
  border-bottom: none;
}

#toggleSidebarBtn {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
}

</style>
</head>
<body>
    <div class="ms-3">
<!-- Button to toggle sidebar -->
<a href="#" id="toggleSidebarBtn">Show Categories</a>
    </div>
<!-- Content -->
<div class="sidebar-content ms-3">
  <!-- Categories will be added here dynamically -->
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
  const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
  const sidebarContent = document.querySelector('.sidebar-content');
  let sidebarOpen = false;

  toggleSidebarBtn.addEventListener('click', function() {
    if (sidebarOpen) {
      // Close sidebar
      sidebarContent.innerHTML = '';
      sidebarContent.style.width = '0';
      sidebarOpen = false;
    } else {
      // Open sidebar and add categories
      sidebarContent.innerHTML = '';
      const categories = [
        { name: 'Travel', url: '/travel' },
        { name: 'Finance', url: '/finance' },
        { name: 'Stocks', url: '/stocks' },
        { name: 'Real Estate', url: '/real-estate' }
      ];
      const categoriesList = document.createElement('ul');
      categories.forEach(category => {
        const listItem = document.createElement('li');
        const categoryLink = document.createElement('a');
        categoryLink.href = category.url;
        categoryLink.textContent = category.name;
        listItem.appendChild(categoryLink);
        categoriesList.appendChild(listItem);
      });
      sidebarContent.appendChild(categoriesList);
      sidebarContent.style.width = '200px'; // Adjust width as needed
      sidebarOpen = true;
    }
  });
});

</script>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

