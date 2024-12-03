<?php
include "../config/db_connect.php";
include "../includes/menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <!-- <header>
        <?php $current_file = basename($_SERVER['PHP_SELF']); ?>
        <nav class="navbar navbar-dark navbar-expand-lg container-fluid" id="navigation-bar" <?php if ($current_file != "index.php" && $current_file != "login.php" && $current_file != "sign_up.php") { ?>
            style="background-color: #001C81;" <?php } ?>>

            <a href="index.php" class="navbar-brand d-flex flex-row align-content-center justify-content-center">
                <img src="../assets/images/University_of_Eswatini_logo 1.png" style="aspect-ratio: initial;" height="30px;" alt="">
                <div class="d-flex flex-column"><span style="color: #FFFF00; font-size: 15px;">University of Eswatini</span><span style="color: #FFFF00; font-size: 15px;">Refectory Ordering System</span> <br>Dashboard</div>
            </a>


        </nav>
    </header> -->
  <main>

    <!-- Sidebar and Content Wrapper -->
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-dark text-white p-3" id="sidebar">
        <h2 class="text-center mb-4">Dashboard Menu</h2>
        <nav>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="add-items-link">Add Items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="top-up-link">Top Up User Balance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="order-list-link">Order List</a>
            </li>
          </ul>
        </nav>
      </div>



      <!-- Main Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <button class="btn btn-primary" id="menu-toggle">☰ Toggle Menu</button>

          <h1 class="mt-4">University of Eswatini Refectory Dashboard</h1>

          <!-- Content Sections -->
          <div id="add-items" class="content-section" style="display: block;">
            <h3>Add Items</h3>

            <form action="add_item.php" method="POST" enctype="multipart/form-data" class="w-75 d-flex flex-column mt-5">
              <div class="mb-3">
                <label for="itemName" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="itemName" name="itemName" required>
              </div>
              <div class="mb-3">
                <label for="itemPrice" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="itemPrice" name="itemPrice" required>
              </div>
              <div class="mb-3">
                <label for="itemImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="itemImage" name="itemImage" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Item</button>
            </form>


            <table class="table table-striped table-bordered table-responsive-sm mt-5">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($menu_items as $menu_item) {
                ?>
                  <!-- Table Row 1 -->
                  <tr>
                    <td class="d-flex justify-content-center align-items-center"><img src="<?php echo $menu_item['image']; ?>" alt="Menu Item" class="img-fluid" style="width: 200px;"></td>
                    <td><?php echo $menu_item['name']; ?></td>
                    <td><?php echo $menu_item['price'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" onclick="editItem(1)">
                        <i class="bi bi-pencil"></i> Edit
                      </button>
                      <button class="btn btn-danger btn-sm" onclick="deleteItem(1)">
                        <i class="bi bi-trash"></i> Delete
                      </button>
                    </td>
                  </tr>
                <?php
                } ?>

              </tbody>
            </table>
          </div>

          <div id="top-up" class="content-section" style="display:none;">
            <h3>Top Up User Balance</h3>
            <form action="top_up_balance.php" class="w-75" method="POST">
              <div class="mb-3">
                <label for="studentId" class="form-label">ID</label>
                <input type="number" class="form-control" id="studentId" name="studentId" required>
              </div>
              <div class="mb-3">
                <label for="amount" class="form-label">Amount to Top Up</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
              </div>
              <button type="submit" class="btn btn-primary">Top Up Balance</button>
            </form>
          </div>

          <div id="order-list" class="content-section" style="display:none;">
            <h3>Order List</h3>
            <table class="table table-striped table-bordered table-responsive-sm mt-5">
              <thead>
                <tr>
                  <th>OrderID</th>
                  <th>User ID</th>
                  <th>Order items</th>
                  <th>Time of order</th>
                  <th>Total</th>
                  <th>Status</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($menu_items as $menu_item) {
                ?>
                  <!-- Table Row 1 -->
                  <tr>
                    <td class="d-flex justify-content-center align-items-center"><img src="<?php echo $menu_item['image']; ?>" alt="Menu Item" class="img-fluid" style="width: 200px;"></td>
                    <td><?php echo $menu_item['name']; ?></td>
                    <td><?php echo $menu_item['price'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" onclick="editItem(1)">
                        <i class="bi bi-pencil"></i> Edit
                      </button>
                      <button class="btn btn-danger btn-sm" onclick="deleteItem(1)">
                        <i class="bi bi-trash"></i> Delete
                      </button>
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                <?php
                } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </main>
  <script src="../assets/js/script.js"></script>
</body>

</html>