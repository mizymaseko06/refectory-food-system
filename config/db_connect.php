<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "refectory";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection to MySQL server failed: " . mysqli_connect_error());
}

$db_check_query = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($conn, $db_check_query)) {
    mysqli_select_db($conn, $db_name);
} else {
    die("Error creating/selecting database: " . mysqli_error($conn));
}

// echo "Database connected successfully!";
