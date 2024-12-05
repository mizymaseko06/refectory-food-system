<?php
session_start();
include "../config/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id'])) {
        echo json_encode(["success" => false, "message" => "User not logged in"]);
        exit();
    }

    $userID = $_SESSION['id'];
    $cart = json_decode($_POST['cart'], true);
    $totalPrice = 0;

    // Calculate total price
    foreach ($cart as $item) {
        $totalPrice += $item['total'];
    }

    // Begin transaction
    $conn->begin_transaction();

    try {
        // Insert into Orders
        $insertOrderQuery = "INSERT INTO Orders (userID, total) VALUES (?, ?)";
        $stmt = $conn->prepare($insertOrderQuery);
        $stmt->bind_param("id", $userID, $totalPrice);
        $stmt->execute();
        $orderID = $stmt->insert_id;

        // Insert into OrderItems
        $insertOrderItemQuery = "INSERT INTO OrderItems (orderID, itemID, qty, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertOrderItemQuery);

        foreach ($cart as $item) {
            $stmt->bind_param("iiid", $orderID, $item['id'], $item['quantity'], $item['total']);
            $stmt->execute();
        }

        // Commit transaction
        $conn->commit();
        echo json_encode(["success" => true, "message" => "Checkout successful"]);
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(["success" => false, "message" => "Checkout failed"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>