<?php
session_start();
include "../config/db_connect.php";

if (isset($_GET['id'])) {
    $item_id = intval($_GET['id']);
    $query = "SELECT id, itemName, itemPrice FROM items WHERE id = $item_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add item to cart
        $_SESSION['cart'][] = [
            'id' => $item['id'],
            'name' => $item['itemName'],
            'price' => $item['itemPrice']
        ];
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
