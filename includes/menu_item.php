<div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
    <img src="<?php echo $menu_item['image']; ?>" class="card-img-top item-display-image" alt="...">
    <div class="card-body">
        <h5 class="card-title fw-bold" style="color: #D20000;"><?php echo $menu_item['itemName']; ?></h5>
        <h6 class="fst-italic">E<?php echo $menu_item['itemPrice']; ?></h6>
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

    // Quantity increase function
    function increaseQty(button) {
        const qtyInput = button.previousElementSibling;
        qtyInput.value = parseInt(qtyInput.value) + 1;
    }

    // Quantity decrease function
    function decreaseQty(button) {
        const qtyInput = button.nextElementSibling;
        if (qtyInput.value > 1) {
            qtyInput.value = parseInt(qtyInput.value) - 1;
        }
    }
</script>
