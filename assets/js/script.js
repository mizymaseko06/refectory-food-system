// JavaScript to handle sidebar toggle and section visibility
let menuToggle = document.getElementById('menu-toggle');
menuToggle.addEventListener('click', function () {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
});

// Show content based on selected menu option
let addItemsLink = document.getElementById('add-items-link');
addItemsLink.addEventListener('click', function () {
    showContent('add-items');

});

let topUpLink = document.getElementById('top-up-link');
topUpLink.addEventListener('click', function () {
    showContent('top-up');
});
let viewItemsLink = document.getElementById('view-menu-link');
viewItemsLink.addEventListener('click', function () {
    showContent('view-menu-items');
});


// Function to show the relevant content section
function showContent(sectionId) {
    // Hide all sections
    var sections = document.querySelectorAll('.content-section');
    sections.forEach(function (section) {
        section.style.display = 'none';
    });

    // Show the selected section
    var selectedSection = document.getElementById(sectionId);
    selectedSection.style.display = 'block';
}

document.addEventListener('click', function (event) {
    var sidebar = document.getElementById('sidebar');
    var toggleButton = document.getElementById('menu-toggle');

    // Check if the click is outside of the sidebar and the toggle button
    if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
        sidebar.classList.remove('show');
    }
});

// Optional: Close sidebar when any of the nav links are clicked on mobile
var navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.remove('show');
    });
});


function increaseQty(button) {
    const input = button.parentNode.querySelector('input');
    input.value = parseInt(input.value) + 1;
}

function decreaseQty(button) {
    const input = button.parentNode.querySelector('input');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}

const cart = [];
const cartItemsContainer = document.getElementById("cartItems");
const cartTotalElement = document.getElementById("cartTotal");

// Example function to add an item to the cart
function addToCart(item) {
    const existingItem = cart.find(cartItem => cartItem.id === item.id);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...item, quantity: 1 });
    }
    updateCartModal();
}

// Update the modal content
function updateCartModal() {
    cartItemsContainer.innerHTML = "";
    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItem = document.createElement("div");
        cartItem.className = "d-flex justify-content-between align-items-center mb-3";
        cartItem.innerHTML = `
                <div>
                    <strong>${item.name}</strong>
                    <p class="mb-0">Price: $${item.price.toFixed(2)}</p>
                    <p class="mb-0">Quantity: ${item.quantity}</p>
                </div>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.id})">Remove</button>
            `;
        cartItemsContainer.appendChild(cartItem);
    });

    cartTotalElement.textContent = total.toFixed(2);
}

// Remove an item from the cart
function removeFromCart(id) {
    const itemIndex = cart.findIndex(item => item.id === id);
    if (itemIndex > -1) {
        cart.splice(itemIndex, 1);
    }
    updateCartModal();
}

// Example checkout function
document.getElementById("checkoutButton").addEventListener("click", () => {
    if (cart.length === 0) {
        alert("Your cart is empty!");
    } else {
        alert("Checkout successful!");
        cart.length = 0; // Clear the cart
        updateCartModal();
    }
});

// Add demo items to simulate adding products to the cart
document.addEventListener("DOMContentLoaded", () => {
    addToCart({ id: 1, name: "Item 1", price: 10.0 });
    addToCart({ id: 2, name: "Item 2", price: 15.5 });
});
