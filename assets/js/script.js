// JavaScript to handle sidebar toggle and section visibility
document.getElementById('menu-toggle').addEventListener('click', function () {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
});

// Show content based on selected menu option
document.getElementById('add-items-link').addEventListener('click', function () {
    showContent('add-items');
});

document.getElementById('top-up-link').addEventListener('click', function () {
    showContent('top-up');
});

document.getElementById('order-list-link').addEventListener('click', function () {
    showContent('order-list');
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