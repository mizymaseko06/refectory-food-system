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
                </div>
            </div>
        </section>

        <section id="today-menu">
            <div class="container-sm">
                <span class="fw-bold h1" style="color: #D20000;">Today's menu</span>
                <ul class="nav nav-pills justify-content-center mt-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Recommended for you</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Breakfast</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lunch</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Drinks</a>
                    </li>
                </ul>
                <div class="row card-deck justify-content-center">

                    <?php for ($i = 0; $i < 16; $i++) {
                    ?>
                        <div class="card col-sm-6 col-lg-4 mt-5 ms-1 me-1" style="width: 18rem;">
                            <img src="../assets/images/photo-1615719413546-198b25453f85.png" class="card-img-top item-display-image" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold" style="color: #D20000;">Chicken Meal</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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