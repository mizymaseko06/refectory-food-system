<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <header><img id="hero-bg" src="../assets/images/photo-1615719413546-198b25453f85.png" alt="">
        <nav class="navbar navbar-dark navbar-expand-lg container" id="navigation-bar">
            <a href="" class="navbar-brand"><img src="../assets/images/University_of_Eswatini_logo 1.png" alt=""> <span style="color: #FFFF00">University of Eswatini</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                <ul class="navbar-nav me-5 pe-5">
                    <li class="nav-item"><a href="profile.php" class="nav-link text-light">Profile</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">About Us</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-light">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>

        <section id="hero">
            <!-- <div class="row align-content-center"></div> -->
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
                <div class="row card-deck justify-content-center">

                <?php for ($i=0; $i < 16; $i++) { 
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
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>