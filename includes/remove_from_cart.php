<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['cart'])) {
    $item_id = intval($_GET['id']);
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($item_id) {
        return $item['id'] != $item_id;
    });
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
