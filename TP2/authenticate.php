<?php
session_start();

require  'bdd.php';


$username =htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);

$_SERVER['Message'] = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if(array_key_exists($username,$userse) ) {
        if($userse[$username] === $password) {
            $_SESSION['username'] = $username;
            header('Location: account.php');
        }
        else {
            $_SESSION['Message'] = 'Wrong password';
            header('Location: signin.php');
        }
     }
        else {
            $_SESSION['Message'] = 'Wrong username';
            header('Location: signin.php');
        }
}
else {

header('Location: signin.php');
}