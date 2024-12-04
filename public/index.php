<?php
session_start();
if (!isset($_SESSION['id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}
include "../config/db_connect.php";
include "../includes/menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <?php
    include("../includes/header.php");
    ?>
    <main>
        <section id="hero">
            <div class="container d-flex justify-content-center">
                <div class="surround text-center">
                    <span class="fw-bolder h1" style="color: #FFFF00;">Craving something to eat from the refectory?</span>
                    <p class="lead text-light">Your favourite meals are just a click away</p>
                    <form action="search.php" method="GET" class="d-flex justify-content-center">
                        <label for="search" class="form-label"><input name="search" type="text" class="form-control" id="search" placeholder="Search here"></label>

                        <button class="btn btn-primary h-100" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </section>

        <section id="today-menu">
            <div class="container-sm">
                <span class="fw-bold h1" style="color: #D20000;">Today's menu</span>
                <div class="row justify-content-center">
                    <div class="col-11 px-1">
                        <div class="overflow-auto justify-content-center">
                            <ul class="nav nav-pills mt-5 d-flex flex-nowrap">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all-items">All</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="breakfast-tab" data-bs-toggle="pill" data-bs-target="#breakfast-items">Breakfast</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="lunch-tab" data-bs-toggle="pill" data-bs-target="#lunch-items">Lunch</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="beverages-tab" data-bs-toggle="pill" data-bs-target="#beverages-items">Beverages</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="all-items" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row card-deck justify-content-center">
                            <?php
                            foreach ($menu_items as $menu_item) {
                                include "../includes/menu_item.php";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="breakfast-items" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row card-deck justify-content-center">
                            <?php
                            foreach ($menu_items as $menu_item) {
                                if ($menu_item['category'] == 'Breakfast') {
                                    include "../includes/menu_item.php";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lunch-items" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row card-deck justify-content-center">
                            <?php
                            foreach ($menu_items as $menu_item) {
                                if ($menu_item['category'] == 'Lunch') {
                                    include "../includes/menu_item.php";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="beverages-items" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row card-deck justify-content-center">
                            <?php
                            foreach ($menu_items as $menu_item) {
                                if ($menu_item['category'] == 'Beverages') {
                                    include "../includes/menu_item.php";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="about-us" class="m-5">
            <div class="container-sm">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-lg-4 text-sm-center text-lg-end">
                        <img src="../assets/images/undraw_online_groceries_a02y 1.png" alt="">
                    </div>
                    <div class="col-sm-12 col-lg-4 text-sm-center text-lg-start">
                        <span class="fw-bold h1" style="color: #D20000;">About Us</span>
                        <p class="lead">We offer a fast and convenient way to get your meals on campus. With a user-friendly interface, you can browse the menu, customize your order, and select a pick-up time that suits you - all from your phone or computer.

                            Say goodbye to long lines and waiting times; the system ensures your meal is ready when you are, making campus dining more efficient and enjoyable.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include "../includes/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>