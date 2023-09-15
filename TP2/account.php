<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(120deg, #f0f0f0, #ffffff);
        }
        .container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background: #ffffff;
            padding: 20px;
        }
        h1 {
            color: #333;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>

<body>
<div class="container mt-5 p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Account</h1>
            <p>
                <?php

                if (isset($_SESSION['username'])) {
                    echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
                } else {
                    header('Location: signin.php');
                }
                ?>
            </p>
            <form action="signout.php" method="post">
                <input type="submit" value="Sign Out" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
