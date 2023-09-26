<?php
session_start();
require_once '../Controlleurs/UserControlleur.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['submit'] === 'ChangePassword') {
    $UserControlleur = new UserControlleur();
    $UserControlleur->changePassword();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
<div class="container mt-5 p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Change Password</h1>
            <form action="changePassword.php" method="post">
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password:</label>
                    <input type="password" name="password" id="oldPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>
                <input type="submit" name="submit" value="ChangePassword" class="btn btn-primary w-100">
            </form>
            <?php
            if (isset($_SESSION['Message'])) {
                ?>
                <p class="mt-3 alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['Message'];
                    unset($_SESSION['Message']);
                    ?>
                </p>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
