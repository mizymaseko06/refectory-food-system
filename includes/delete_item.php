<?php
include "../config/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['itemId'];

    $query = "DELETE FROM items WHERE itemID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../admin/dashboard.php");
        exit();
    } else {
        echo "Error deleting item.";
    }
}
