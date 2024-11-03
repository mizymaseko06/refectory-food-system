<?php
include "../config/db_connect.php";
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
                    <form action="login.php" class="credential-form">
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