<?php
session_start();
if (!isset($_SESSION['id'])) {
  // Redirect to login page if not logged in
  header("Location: ../public/login.php");
  exit();
}
// ensures that only admins access the page
if ($_SESSION['role'] != 'admin') {
  header("Location: ../public/error.php");
  exit();
}
include "../config/db_connect.php";
include "../includes/menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
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
        <small class="text-center m-5" style="color: yellow"><?php echo $_SESSION['email']; ?></small>
        <h2 class="text-center mb-4">Dashboard Menu</h2>
        <nav>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="view-menu-link">View menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="add-items-link">Add menu items</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#" id="top-up-link">Top Up User Balance</a>
            </li>
            <li><a class="nav-link btn btn-danger text-white mt-5" href="../includes/logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>



      <!-- Main Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <button class="btn btn-primary" id="menu-toggle">☰ Toggle Menu</button>

          <h1 class="mt-4">University of Eswatini Refectory Dashboard</h1>

          <!-- Content Sections -->
          <div id="view-menu-items" class="content-section" style="display: block;">
          <h3>Menu</h3>  
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
                <?php foreach ($menu_items as $menu_item) { ?>
                  <tr>
                    <td class="d-flex justify-content-center align-items-center">
                      <img src="<?php echo $menu_item['image']; ?>" alt="Menu Item" class="img-fluid" style="width: 200px;">
                    </td>
                    <td><?php echo htmlspecialchars($menu_item['itemName']); ?></td>
                    <td><?php echo number_format($menu_item['itemPrice'], 2); ?></td>
                    <td>
                      <form action="../includes/delete_item.php" method="POST" class="d-inline">
                        <input type="hidden" name="itemId" value="<?php echo $menu_item['itemID']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">
                          <i class="bi bi-trash"></i> Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>

            </table>
          </div>
          <div id="add-items" class="content-section" style="display: none;">
            <h3>Add Items</h3>

            <form action="../includes/add_item.php" method="POST" enctype="multipart/form-data" class="w-75 d-flex flex-column mt-5">
              <div class="mb-3">
                <label for="itemName" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="itemName" name="itemName" required>
              </div>
              <div class="mb-3">
                <label for="itemPrice" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="itemPrice" name="itemPrice" required>
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                  <option value="" disabled selected>Select Category</option>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="itemImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="itemImage" name="itemImage" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Item</button>
            </form>
          </div>
          <div id="top-up" class="content-section" style="display:none;">
            <h3>Top Up User Balance</h3>
            <form action="../includes/top_up_balance.php" class="w-75" method="POST">
              <div class="mb-3">
                <label for="userID" class="form-label">ID</label>
                <input type="number" class="form-control" id="userID" name="userID" required>
              </div>
              <div class="mb-3">
                <label for="amount" class="form-label">Amount to Top Up</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
              </div>
              <button type="submit" class="btn btn-primary">Top Up Balance</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>
  <script src="../assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-pzb4oPnrQuO6FhD2OV12H11GSHqBdOXcz5ndNODZMn3uyq+FO7Qlvb5KkLprFlRE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVqiF16TIBHBYvhpO+K31V9R+tG0ZuOr9b+3BzDq0UjM2AuEiOzKWmzHBpL2v4LA" crossorigin="anonymous"></script>

</body>

</html>