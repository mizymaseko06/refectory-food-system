<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>

        <?php $current_file = basename($_SERVER['PHP_SELF']); ?>
        <nav class="navbar navbar-dark navbar-expand-lg container-fluid" id="navigation-bar" <?php if ($current_file != "index.php" && $current_file != "login.php" && $current_file != "sign_up.php") { ?>
            style="background-color: #001C81;" <?php } ?>>

            <a href="index.php" class="navbar-brand d-flex flex-row align-content-center justify-content-center">
                <img src="../assets/images/University_of_Eswatini_logo 1.png" style="aspect-ratio: initial;" height="30px;" alt="">
                <div class="d-flex flex-column"><span style="color: #FFFF00; font-size: 15px;">University of Eswatini</span><span style="color: #FFFF00; font-size: 15px;">Refectory Ordering System</span></div>
            </a>

            <?php
            if ($current_file != "sign_up.php" && $current_file != "login.php") {
            ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                    <ul class="navbar-nav d-flex align-items-center">
                        <li class="nav-item btn btn-primary me-2" style="border-radius: 50%;" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="bi bi-cart"></i></li>
                        <li class="nav-item me-5" style="color: white"><i class="bi bi-wallet2"></i><span>E300.00</span></li>
                        <li class="nav-item"><a href="../includes/logout.php" class="nav-link text-light"><i class="bi bi-box-arrow-right"></i></a></li>
                    </ul>
                </div>
            <?php
            }
            ?>

        </nav>
    </header>
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <!-- Cart items will be dynamically inserted here -->
                    </div>
                    <div class="text-end">
                        <strong>Total: E<span id="cartTotal">0.00</span></strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="checkoutButton">Checkout</button>
                </div>
            </div>
        </div>
    </div>