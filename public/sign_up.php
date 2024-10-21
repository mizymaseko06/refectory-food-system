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
                    <form class="credential-form">
                        <span class="fw-bolder h2" style="color: #D20000;">Sign Up</span><br />
                        <div class="registration">
                            <span class="fs-6 fw-bold">Registration</span>
                            <div class="form-group mt-3">
                                <label for="ID">Student/Staff ID</label>
                                <input type="text" class="form-control" id="ID" placeholder="Enter ID">
                            </div>
                            <div class="form-group my-2">
                                <label for="userPassword">Password</label>
                                <input type="password" class="form-control" id="userPassword" placeholder="Password">
                                <span id="passwordInstructions" class="form-text text-muted">Password should have minimum 8 characters</span>
                            </div>
                            <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="verification">
                            <span class="fs-6 fw-bold">Verification using OTP</span>
                            <div class="form-group my-3">
                                <label for="OTP">OTP</label>
                                <input type="number" class="form-control" id="OTP" placeholder="Enter 4-digit OTP here">
                                <!-- pop up written "An OTP was sent to 202100111@student.uniswa.sz" will appear -->
                            </div>

                            <button type="submit" id="verifyBtn" class="btn btn-primary mt-1">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    </body>

</html>