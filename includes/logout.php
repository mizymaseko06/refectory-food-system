<?php
session_start();

// Destroy session and redirect to login page
session_unset();
session_destroy();

header("Location: ../public/login.php");
exit();
