<?php
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
            <div class="container d-flex justify-content-center align-items-center">
                <div class="surround text-center">
                    <span class="fw-bolder h1" style="color: #FFFF00;">Craving something to eat from the refectory?</span>
                    <p class="lead text-light">Your favourite meals are just a click away</p>
                    <form action="" class="justify-content">
                        <label for="search" class="form-label"><input type="search" class="form-control" id="search" placeholder="Search here"></label>
                        <button class="btn btn-primary"><i class="bi bi-search"></i></button>

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
                                if ($menu_item['categories'] == 'Breakfast') {
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
                                if ($menu_item['categories'] == 'Lunch') {
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
                                if ($menu_item['categories'] == 'Beverages') {
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
    <footer style="background-color: #001C81;">
        <div class="container-sm justify-content-center" style="color: white;">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-4">
                    <a href="" class="navbar-brand d-flex flex-row">
                        <img src="../assets/images/University_of_Eswatini_logo 1.png" style="aspect-ratio: initial;" height="30px;" alt="">
                        <div class="d-flex flex-column fw-bold"><span style="color: #FFFF00; font-size: 15px;">University of Eswatini</span><span class="fw-bold" style="color: #FFFF00; font-size: 15px;">Refectory Ordering System</span></div>
                    </a>
                    <span>This system is owned and operated by University of Eswatini. All content and services are for exclusive use by students and staff</span>
                </div>

                <div class="col-sm-6 col-lg-3 pt-4">
                    <h6 class="fw-bold" style="color: #FFFF00;">Information</h6>
                    <span>Privacy Policy</span>
                    <span>Terms of Service</span>

                </div>
                <div class="col-sm-6 col-lg-3 pt-4">
                    <h6 class="fw-bold" style="color: #FFFF00;">Get in touch with us</h6>
                    <span>refectory@uniswa.sz</span>
                    <span>+268 2518 1234</span>

                </div>
            </div>
            <p id="copyright-message" class="text-center p-5" style="color:#FFFF00; font-size: 10px;">© 2024 University of Eswatini Refectory Ordering System. All Rights Reserved.</p>

        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>