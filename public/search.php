<?php
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] == 'admin') {
    header("Location: error.php");
    exit();
}
include '../config/db_connect.php';

if (isset($_GET['search'])) {
    // Deals with escape characters
    $searchValue = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM items WHERE itemName LIKE '%$searchValue%'";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Results</title>
    <?php include '../includes/header.php'; ?>
</head>

<body>
    <main class="main-top-margin">
        <div class="container-sm">
            <a href='index.php' class='btn btn-primary mb-3'>Return to Home</a>
            <p class="fw-bold h3" style="color: #D20000;">Search results for "<?php echo htmlspecialchars($searchValue); ?>"</p>
            <div class="row card-deck justify-content-center">
                <?php
                if (isset($result) && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top item-display-image" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold" style="color: #D20000;"><?php echo htmlspecialchars($row['itemName']); ?></h5>
                                <h6 class="fst-italic">E<?php echo htmlspecialchars($row['itemPrice']); ?></h6>
                                <!-- Quantity Modifier -->
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <button class="btn btn-outline-primary btn-sm" onclick="decreaseQty(this)">-</button>
                                    <input type="number" class="form-control text-center mx-2" style="width: 60px;" value="1" min="1" readonly>
                                    <button class="btn btn-outline-primary btn-sm" onclick="increaseQty(this)">+</button>
                                </div>
                                <button class="btn btn-primary w-100 mt-3 add-to-cart-btn"
                                    onclick="addToCart('<?php echo $menu_item['itemName']; ?>', '<?php echo $menu_item['itemPrice']; ?>', this)">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p class='text-center mt-4'>No items found.</p>";
                }
                mysqli_close($conn);
                ?>
            </div>

        </div>
    </main>

    <?php include "../includes/footer.php"; ?>

    <script>
        // Cart data
        const cart = [];

        // Function to add an item to the cart
        function addToCart(itemName, itemPrice, element) {
            const card = element.closest('.card');
            const qtyInput = card.querySelector('input[type="number"]');
            const quantity = parseInt(qtyInput.value);

            const item = {
                name: itemName,
                price: parseFloat(itemPrice),
                quantity: quantity,
                total: parseFloat(itemPrice) * quantity
            };

            // Check if the item already exists in the cart
            const existingItem = cart.find(cartItem => cartItem.name === item.name);
            if (existingItem) {
                existingItem.quantity += quantity;
                existingItem.total += item.total;
            } else {
                cart.push(item);
            }

            // Update the cart UI
            updateCartUI();
        }

        // Function to update the cart modal
        function updateCartUI() {
            const cartItemsContainer = document.getElementById('cartItems');
            const cartTotalElement = document.getElementById('cartTotal');
            cartItemsContainer.innerHTML = ''; // Clear existing items

            let cartTotal = 0;

            cart.forEach(item => {
                cartTotal += item.total;

                const cartItemHTML = `
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <strong>${item.name}</strong>
                        <small class="text-muted">(x${item.quantity})</small>
                    </div>
                    <div>E${item.total.toFixed(2)}</div>
                </div>
            `;
                cartItemsContainer.innerHTML += cartItemHTML;
            });

            cartTotalElement.textContent = cartTotal.toFixed(2);
        }

        // Quantity modifier functions
        function decreaseQty(button) {
            const input = button.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        function increaseQty(button) {
            const input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>