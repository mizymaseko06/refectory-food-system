<?php
session_start();
include_once "../config/db_connect.php";
include_once "../config/db_create.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schoolID = mysqli_real_escape_string($conn, $_POST['userID']);
    $password = $_POST['userPassword'];

    $query = "SELECT school_ID, password from users where school_ID=?";
    // initialize prepared statement

    // prepare the prepared statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // binding parameters to placeholder
        mysqli_stmt_bind_param($stmt, "s", $schoolID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        //checks if user with that ID exists
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $schoolID_db, $password_hash);
            mysqli_Stmt_fetch($stmt);

            // verify password

            if (password_verify($password, $password_hash)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $schoolID_db;
                header("Location: index.php");
                exit;
            } else {
?>
                <script>
                    alert("Invalid password")
                </script>
<?php
            }
        } else {
            echo "Invalid username";
        }
        mysqli_stmt_close($stmt);
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
                        <span class="fw-bolder h2" style="color: #D20000;">Log In</span><br />
                        <div id="sign-up">
                            <span class="fs-6 fw-bold">Fill in your credentials</span><br>
                            <div class="form-group mt-3">
                                <label for="ID">Student/Staff ID</label>
                                <input type="text" class="form-control" name="userID" placeholder="Enter ID">
                            </div>
                            <div class="form-group my-2">
                                <label for="userPassword">Password</label>
                                <input type="password" class="form-control" name="userPassword" placeholder="Password">
                                <span id="passwordInstructions" class="form-text text-muted">Password should have minimum 8 characters</span>
                            </div>
                            <button type="submit" id="proceedBtn" name="submit" class="btn btn-primary">Sign In</button>
                        </div>
                </div>
                </form>
            </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/script.js"></script>
    </body>

</html>