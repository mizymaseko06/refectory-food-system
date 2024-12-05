<?php
include "../config/db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $user_id = trim($_POST['userID']);
    $amount = floatval($_POST['amount']);

    // // Check for valid input
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "Invalid email format.";
    //     exit;
    // }

    if ($amount <= 0) {
        echo "Amount must be greater than zero.";
        exit;
    }

    // Update the user's balance
    $query = "UPDATE users SET balance = balance + ? WHERE schoolID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ds", $amount, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Balance updated successfully for $user_id.";
    } else {
        echo "No user found with email $user_id or balance unchanged.";
    }

    header("Location: ../admin/dashboard.php");

    $stmt->close();
    $conn->close();
}
?>
