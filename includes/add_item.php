<?php
// Include the database connection
include_once "../config/db_connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $category = $_POST['category'];
    $itemImage = $_FILES['itemImage'];

    // Validate inputs
    if (empty($itemName) || empty($itemPrice) || empty($category) || empty($itemImage)) {
        die("Please fill out all fields.");
    }

    // Process the image upload
    $uploadDir = "../assets/images/";
    $imageName = basename($itemImage['name']);
    $uploadFile = $uploadDir . $imageName;

    // Check if the file is an image
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($fileType, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, and GIF files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($itemImage['tmp_name'], $uploadFile)) {
        die("Error uploading the file.");
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO items (itemName, itemPrice, category, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $itemName, $itemPrice, $category, $uploadFile);

    if ($stmt->execute()) {
        echo "Item added successfully')";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to the home page or dashboard
    header("Location: ../admin/dashboard.php");
    exit;
} else {
    die("Invalid request.");
}
?>
