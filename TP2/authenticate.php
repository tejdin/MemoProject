<?php
session_start();

require  'bdd.php';


$username =htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);

// verify if the http request is a POST request

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if(array_key_exists($username,$userse) ) {
        if($userse[$username] === $password) {
            $_SESSION['username'] = $username;
            header('Location: account.php');
        }
        else {
            header('Location: signin.php');
        }
     }
}
else {
header('Location: signin.php');
}