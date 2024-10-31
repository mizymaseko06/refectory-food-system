<?php
include '../config/db_connect.php';

if (isset($_GET['search'])) {
    //deals with escape characters
    $searchValue = mysqli_real_escape_string($conn, $_GET['search']);

    $query = "SELECT * FROM menu WHERE name LIKE '%$searchValue%'";

    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <?php
    include '../includes/header.php';
    ?>

    <main>
        <?php
        if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top item-display-image" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #D20000;"><?php echo $row['name']; ?></h5>
                        <h6 class="fst-italic">E<?php echo $row['price'] ?></h6>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="#" class="btn btn-primary">Add to cart</a>
                    </div>
                </div>
        <?php
            }
        }
        mysqli_close($conn);
        ?>
    </main>