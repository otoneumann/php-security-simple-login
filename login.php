<!DOCTYPE html>
<html lang="en">
<?php
include('includes/secureSession.inc.php');
$title = 'Login';
include './includes/head.inc.php';
include('includes/db.inc.php');
$problem = '';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $query->execute([$username]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['loggedin'] = true;
        header('Location: dashboard.php');
    } else {
        $problem = 'Invalid username or password!';
    }
}
?>

<body>
<?php
include('./includes/navbar.inc.php');
?>
<main class="container-lg  d-flex justify-content-center align-items-center min-vh-100">

    <div class="col-12 col-sm-12 col-md-6">

        <div class="shadow-sm p-2">
            <h2>Login</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" id="username" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <!-- php here -->
                <button type="submit" class="btn btn-primary">Login</button>
                <?php
                if ($problem) {
                    echo "<h3 class='bg-success p-2 my-3 text-white rounded'>" . $problem . "</h3>";
                }
                ?>
            </form>
        </div>
    </div>
</main>
</body>


</div>

</html>