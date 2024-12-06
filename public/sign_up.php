<?php
include '../config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolID = mysqli_real_escape_string($conn, $_POST['userID']);
    $password = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);
    $role = mysqli_real_escape_string($conn, $_POST['userRole']);

    // Generate the email based on the role and ID
    if ($role == 'student') {
        $school_email = $schoolID . '@student.uniswa.sz';
    } elseif ($role == 'staff') {
        $school_email = $schoolID . '@uniswa.sz';
    } else {
        $school_email = $schoolID . '@refectory.com'; // Generic email for admin
    }

    // Insert into the Users table
    $query = "INSERT INTO Users (schoolID, email, password, role) VALUES ('$schoolID', '$school_email', '$password', '$role')";

    // Execute the query
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
    <title>Sign Up</title>
    <?php include("../includes/header.php"); ?>
</head>

<body>
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
                            <p style="margin: 10px 0 0 0;">User Role:</p>
                            <div class="d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="userRole" value="student" checked>
                                    <label class="form-check-label">Student</label>
                                </div>
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="radio" name="userRole" value="staff">
                                    <label class="form-check-label">Staff</label>
                                </div>
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="radio" name="userRole" value="admin">
                                    <label class="form-check-label">Admin</label>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="userID">User ID</label>
                                <input type="text" class="form-control" name="userID" placeholder="Enter User ID" required>
                            </div>

                            <div class="form-group my-2">
                                <label for="userPassword">Password</label>
                                <input type="password" class="form-control" name="userPassword" placeholder="Password" required>
                                <span id="passwordInstructions" class="form-text text-muted">Password should have a minimum of 8 characters</span>
                            </div>
                            <button type="submit" id="proceedBtn" name="submit" class="btn btn-primary">Proceed</button>
                            <p class="small">If you have an account, <a href="login.php">log in here</a>.</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../assets/js/script.js"></script>
</body>

</html>