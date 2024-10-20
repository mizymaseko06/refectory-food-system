<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <header>
        <?php
        $current_file =  basename($_SERVER['PHP_SELF']);
        if ($current_file == 'index.php') {
        ?>
            <img id="hero-bg" src="../assets/images/photo-1615719413546-198b25453f85.png" alt="">
        <?php
        }
        ?>

        <nav class="navbar navbar-dark navbar-expand-lg container" id="navigation-bar">
            <a href="" class="navbar-brand d-flex flex-row align-content-center justify-content-center">
                <img src="../assets/images/University_of_Eswatini_logo 1.png" style="aspect-ratio: initial;" height="30px;" alt="">
                <div class="d-flex flex-column"><span style="color: #FFFF00; font-size: 15px;">University of Eswatini</span><span style="color: #FFFF00; font-size: 15px;">Refectory Ordering System</span></div>
            </a>

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