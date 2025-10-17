<!DOCTYPE html>
<html lang="en">

<?php
include('includes/secureSession.inc.php');
$title = 'User Dashboard';
include './includes/head.inc.php';
include('includes/db.inc.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$user_id]);
$user = $query->fetch();

?>

<body>
<?php
include('./includes/navbar.inc.php');
?>
<main class="container-lg  d-flex justify-content-center align-items-center min-vh-100">

    <div class="col-12 col-sm-12 col-md-6">

        <div class="shadow-sm p-2">
            <?php
            echo "<h2>Welcome, " . $user['username'] . "</h2>";
            echo "<a href='logout.php'>
                        <button class='btn btn-danger'>Logout</button>
                    </a>";

            ?>
        </div>
</main>
</body>

</html>