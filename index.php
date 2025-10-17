<!DOCTYPE html>
<html lang="en">
<?php
include('includes/secureSession.inc.php');
$title = 'Login System';
include './includes/head.inc.php';
?>


<body>
<?php
include('./includes/navbar.inc.php');
?>
<!-- hero -->
<section class="hero d-flex justify-content-center align-items-center ">
    <div class="hero-content text-center bg-black py-3 px-5 rounded">
        <h1 class="fs-1 fw-bold text-white">Login or Register</h1>
        <a href="./login.php">
            <button class="btn btn-warning btn-md">Login</button>
        </a>
        <a href="./register.php">
            <button class="btn btn-warning btn-md">Register</button>
        </a>
    </div>
</section>
</body>

<!-- php here -->


</html>