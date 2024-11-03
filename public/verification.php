<?php
include '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolID = mysqli_real_escape_string($conn, $_POST['userID']);
    $password = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($conn, $_POST['userRole']);


    if ($role == 'student') {
        $school_email = $ID . '@student.uniswa.sz';
    } elseif ($role == 'staff') {
        $school_email = $ID . '@staff.uniswa.sz';
    }

    $query = "INSERT INTO users (school_ID, email, password) VALUES ('$schoolID','$school_email', '$password')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful!";
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <?php
    include("../includes/header.php");
    ?>

    <main>
        <section class="credential-body container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <img src="../assets/images/cook_in_kitchen.png" class="preview-image" alt="">
                </div>
                <div class="col-sm-10 col-md-4 form-bg">
                    <form action="sign_up.php" class="credential-form">
                        <span class="fw-bolder h2" style="color: #D20000;">Sign Up</span><br/>
                        <div id="verification">
                            <span class="fs-6 fw-bold">Verification using OTP</span>
                            <div class="form-group my-3">
                                <label for="OTP">OTP</label>
                                <input type="number" class="form-control" id="OTP" placeholder="Enter 4-digit OTP here">
                            </div>

                            <button type="submit" id="verifyBtn" class="btn btn-primary mt-1">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
    </body>

</html>