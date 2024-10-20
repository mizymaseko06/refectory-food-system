<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="no-scroll">

    <div class="container-fluid" style="padding: 0;">
        <div class="row">
            <div class="col-sm-12 col-lg-6 justify-content-start">
                <img src="../assets/images/cook_in_kitchen.png" class="preview-image" alt="">
                <nav class="navbar navbar-dark navbar-expand-lg container" id="navigation-bar">
                    <a href="" class="navbar-brand d-flex flex-row align-content-center justify-content-center">
                        <img src="../assets/images/University_of_Eswatini_logo 1.png" style="aspect-ratio: initial;" height="30px;" alt="">
                        <div class="d-flex flex-column"><span style="color: #FFFF00; font-size: 15px;">University of Eswatini</span><span style="color: #FFFF00; font-size: 15px;">Refectory Ordering System</span></div>
                    </a>
                </nav>
            </div>


            <div class="col-sm-12 col-lg-3 justify-content-center">
                <div>

                    <form class="credential-form">
                        <span class="fw-bolder h2" style="color: #D20000;">Sign Up</span><br />
                        <div class="registration">
                            <span class="fs-6 fw-bold">Registration</span>
                            <div class="form-group mt-3">
                                <label for="ID">Student/Staff ID</label>
                                <input type="text" class="form-control" id="ID" placeholder="Enter ID">
                            </div>
                            <div class="form-group my-2">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                <span id="passwordInstructions" class="form-text text-muted">Password should have minimum 8 characters</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="verification">
                            <span class="fs-6 fw-bold">Verification using OTP</span>
                            <div class="form-group my-3">
                                <label for="exampleInputEmail1">Student/Staff ID</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter 4-digit OTP here">
                                <!-- pop up written "An OTP was sent to 202100111@student.uniswa.sz" will appear -->
                            </div>

                            <button type="submit" class="btn btn-primary mt-1">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>