<?php
$host = "localhost";
$username = "refectory";
$password = "";
$db_name = "refectory-food-system";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
