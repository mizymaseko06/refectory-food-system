<?php
include '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolID = mysqli_real_escape_string($conn, $_POST['userID']);
    $password = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($conn, $_POST['userRole']);

    if ($role == 'student') {
        $school_email = $schoolID . '@student.uniswa.sz';
        $query = "INSERT INTO users (school_ID, email, password) VALUES ('$schoolID','$school_email', '$password')";
    } elseif ($role == 'staff') {
        $school_email = $schoolID . '@uniswa.sz';
        $query = "INSERT INTO admin (school_ID, email, password) VALUES ('$schoolID','$school_email', '$password')";
    }


    if (mysqli_query($conn, $query)) {
        echo "Registration successful!";
        header("Location: login.php");
        exit();
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
                    <form action="" method="POST" class="credential-form">
                        <span class="fw-bolder h2" style="color: #D20000;">Sign Up</span><br />
                        <div id="registration">
                            <span class="fs-6 fw-bold">Registration</span><br>
                            <p style="margin: 10px 0 0 0;">User type:</p>
                            <div style="display: flex; flex-direction: row;">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="userRole" value="student" checked>
                                    <label class="form-check-label" for="studentRole">
                                        Student
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left: 10px;">
                                    <input class="form-check-input" type="radio" name="userRole" value="staff">
                                    <label class="form-check-label" for="staffRole">
                                        Staff
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mt-3">

                                <label for="ID">Student/Staff ID</label>
                                <input type="text" class="form-control" name="userID" placeholder="Enter ID">
                            </div>
                            <div class="form-group my-2">
                                <label for="userPassword">Password</label>
                                <input type="password" class="form-control" name="userPassword" placeholder="Password">
                                <span id="passwordInstructions" class="form-text text-muted">Password should have minimum 8 characters</span>
                            </div>
                            <button type="submit" id="proceedBtn" name="submit" class="btn btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
    </body>

</html>