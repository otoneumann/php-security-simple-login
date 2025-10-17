<!DOCTYPE html>
<html lang="en">

<?php
include('includes/secureSession.inc.php');
$title = 'Register';
include './includes/head.inc.php';
include('includes/db.inc.php');
$success = '';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
    $query->execute([$username, $email, $password]);

    $success = 'Registration successful!';
}
?>

<body>
<?php
include('./includes/navbar.inc.php');
?>
<main class="container-lg d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-12 col-sm-12 col-md-6">

        <div class="shadow-sm p-2">
            <h2>Register</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" id="username" type="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <?php
                if ($success) {
                    echo "<h3 class='bg-success p-2 my-3 text-white rounded'>" . $success . "</h3>";
                }
                ?>
            </form>
        </div>
    </div>
</main>
</body>


</html>