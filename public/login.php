<?php
session_start();
include_once "../config/db_connect.php";
include_once "../config/db_create.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolID = mysqli_real_escape_string($conn, $_POST['schoolID']);
    $password = $_POST['userPassword'];

    // Modify query to include the role column
    $query = "SELECT schoolID, password, role, email FROM users WHERE schoolID=?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $schoolID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $schoolID_db, $password_hash, $role, $email_address);
            mysqli_stmt_fetch($stmt);

            // Verify the password
            if (password_verify($password, $password_hash)) {
                // Store session variables, including the user's role
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $schoolID_db;
                $_SESSION['role'] = $role; // Store the user's role
                $_SESSION['email'] = $email_address;

                // Redirect to the homepage or dashboard
                if ($_SESSION['role'] == 'admin') {
                    header("Location: ../admin/dashboard.php");
                    exit();
                } else {
                    header("Location: index.php");
                }
                exit;
            } else {
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            echo "<script>alert('Invalid username');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
                        <span class="fw-bolder h2" style="color: #D20000;">Log In</span><br />
                        <div id="sign-up">
                            <span class="fs-6 fw-bold">Fill in your credentials</span><br>
                            <div class="form-group mt-3">
                                <label for="ID">ID</label>
                                <input type="text" class="form-control" name="schoolID" placeholder="Enter school ID" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="userPassword">Password</label>
                                <input type="password" class="form-control" name="userPassword" placeholder="Password" required>
                                <span id="passwordInstructions" class="form-text text-muted">Password should have minimum 8 characters</span>
                            </div>
                            <button type="submit" id="proceedBtn" name="submit" class="btn btn-primary">Sign In</button>
                        </div>
                        <p class="small">If you don't have an account, <a href="sign_up.php">sign up here</a>.</p>
                </div>
                </form>
            </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
    </body>

</html>