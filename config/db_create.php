<?php
require_once "../includes/db_connect.php";

$query = "CREATE DATABASE IF NOT EXISTS 'refectory-food-system'";

if(mysqli_query($conn, $query)){
    echo "DB created successfully";
}
else{
    echo "Error creating DB".mysqli_error($conn);
}

mysqli_close($conn);