<?php
// delete_item.php - Handle deletion of menu item

// Include database connection
require_once '../config/db_connect.php';

// Check if ID is set in the request
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Prepare the SQL query to delete the item
    $sql = "DELETE FROM menu_items WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the page to refresh the table after deletion
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>