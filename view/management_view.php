<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Inventory Management</title>
  <link rel="stylesheet" href="../css/style_management.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="/home(admin)/home.html" class="logo">
            <img src="../Chorus.png" />
            <span class="nav-item">Admin 1</span>
          </a>
        </li>
        <li>
          <a href="../Inventory_Tracking/page.html">
            <i class="fas fa-chart-bar"></i>
            <span class="nav-item">Inventory Tracking</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-database"></i>
            <span class="nav-item">Inventory Management</span>
          </a>
        </li>
        <li>
          <a href="#" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>
    <section class="inventory">
      <div class="inventory-list">
        <h1>Inventory Management</h1>
        <button class="add-inventory-btn" id="add-inventory-btn">
          Add Product
        </button>

        <?php
        //Include the connection file
        include '../actions/search_action.php';
        ?>

        <div class="search-container">
          <form action="../actions/search_action.php" method= "GET">
            <input type="text" placeholder="Search coundown or product" name="search" id="search-input" />
            <button class="add-inventory-btn" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>SKU</th>
              <th>Category</th>
              <th>Quantity in Stock</th>
              <th>Location</th>
              <th>Product Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="product-list">
            <?php include '../functions/product_fxn.php'; ?>
          </tbody>
        </table>
      </div>
      <div class="modal" id="add-inventory-modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Add a New Product</h2>
          <form action="../actions/add_product_action.php" method="post" id="product-form">
            <label for="product-name">Product Name:</label>
            <input type="text" name="product-name" id="product-name" placeholder="Enter product name" required />
            <label for="sku">SKU:</label>
            <input type="text" name="sku" id="sku" placeholder="Enter SKU of product" required />
            <label for="category">Category:</label>
            <select class="add-inventory-btn" name="category" id="category" required>
              <option value="0">Select</option>
              <?php
              include "../functions/select_category_fxn.php";
              echo $options;
              ?>
            </select>
            <label for="qty-in-stock">Quantity in Stock:</label>
            <input type="number" name="qty-in-stock" id="qty-in-stock" placeholder="Enter quantity in stock" required />
            <label for="LocationInshop">Location in shop:</label>
            <input type="text" name="LocationInshop" id="LocationInshop" placeholder="Enter location in shop" required />
            <label for="product-description">Product Description(optional):</label>
            <input type="text" name="product-description" id="product-description" placeholder="Enter product description" />
            <button type="submit" name="submit" class="add-inventory-btn" id="add-inventory-btn">
              Add Product
            </button>
          </form>
        </div>
      </div>
      
    </section>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const addInventorybtn = document.getElementById("add-inventory-btn");
      const modal = document.getElementById("add-inventory-modal");
      const closeModalBtn = document.querySelector(".modal .close");

      // Add event listener to the add product button
      addInventorybtn.addEventListener("click", () => {
        modal.style.display = "block";
      });

      // Add event listener to the close button of add product modal
      closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
      });


      // const EditInventorybtn = document.getElementById("edit-inventory-btn");
      // const editModal = document.getElementById("edit-inventory-modal");
      // const EditCloseModalBtn = document.querySelector(".modal .close");

      //  // Add event listener to the add product button
      //  EditInventorybtn.addEventListener("click", () => {
      //   editModal.style.display = "block";
      // });

      // // Add event listener to the close button of add product modal
      // EditCloseModalBtn.addEventListener("click", () => {
      //   editModal.style.display = "none";
      // });
    });
  </script>
</body>

</html>