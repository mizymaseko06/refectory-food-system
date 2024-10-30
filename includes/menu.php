<?php
$query = 'SELECT name, price, image FROM menu';
$result = mysqli_query($conn, $query);
$menu_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

