<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "refectory";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection to MySQL server failed: " . mysqli_connect_error());
}

// Create the database if it doesn't exist
$db_check_query = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($conn, $db_check_query)) {
    mysqli_select_db($conn, $db_name);
} else {
    die("Error creating/selecting database: " . mysqli_error($conn));
}

// SQL to create the Users table
$users_table = "CREATE TABLE IF NOT EXISTS Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM('student', 'staff', 'admin') NOT NULL
)";

// SQL to create the Items table
$items_table = "CREATE TABLE IF NOT EXISTS Items (
    itemID INT AUTO_INCREMENT PRIMARY KEY,
    itemName VARCHAR(255) NOT NULL,
    itemPrice DECIMAL(10, 2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    isAvailable BOOLEAN DEFAULT TRUE
)";

// SQL to create the Orders table
$orders_table = "CREATE TABLE IF NOT EXISTS Orders (
    orderID INT AUTO_INCREMENT PRIMARY KEY,
    orderTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    orderStatus ENUM('pending', 'completed', 'cancelled') NOT NULL,
    userID INT NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users(userID) ON DELETE CASCADE
)";

// SQL to create the OrderItems table
$order_items_table = "CREATE TABLE OrderItems (
    orderItemID INT AUTO_INCREMENT PRIMARY KEY,
    orderID INT NOT NULL,
    itemID INT NOT NULL,
    qty INT NOT NULL,
    price DECIMAL(10, 2) AS (qty * (SELECT itemPrice FROM Items WHERE Items.itemID = OrderItems.itemID)) STORED,
    FOREIGN KEY (orderID) REFERENCES Orders(orderID) ON DELETE CASCADE,
    FOREIGN KEY (itemID) REFERENCES Items(itemID) ON DELETE CASCADE
)";

// Execute the SQL queries
if (mysqli_query($conn, $users_table)) {
    echo "Users table created successfully.<br>";
} else {
    echo "Error creating Users table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $items_table)) {
    echo "Items table created successfully.<br>";
} else {
    echo "Error creating Items table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $orders_table)) {
    echo "Orders table created successfully.<br>";
} else {
    echo "Error creating Orders table: " . mysqli_error($conn) . "<br>";
}

if (mysqli_query($conn, $order_items_table)) {
    echo "OrderItems table created successfully.<br>";
} else {
    echo "Error creating OrderItems table: " . mysqli_error($conn) . "<br>";
}

// Close the connection
mysqli_close($conn);
?>
