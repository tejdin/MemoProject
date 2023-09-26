<?php

require_once '../Models/User.php';

class UserControlleur
{
    public User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function authenticate()
    {

        session_start();

        $_SERVER['Message'] = '';
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: signin.php');
            exit();
        }
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header('Location: signin.php');
            exit();
        }


        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);


        $pdostatement = (new User())->authenticate($username);


        if ($pdostatement['username'] !== $username) {
            $_SESSION['Message'] = 'Wrong username';
            header('Location: signin.php');
            exit();
        }
        if (!password_verify($password, $pdostatement['password'])) {
            $_SESSION['Message'] = 'Wrong password';
            header('Location: signin.php');
            exit();
        }

        $_SESSION['username'] = $username;
        header('Location: account.php');


    }

    public function signout()
    {
        session_start();
        session_destroy();
        header('Location: signin.php');
    }

    public function delete()
    {
        session_start();
        $username=$_SESSION['username'];
        $ok=$this->user->deleteUser($username);
        if($ok)
        {
            session_destroy();
            header('Location: signin.php');
        }
        else
        {
            header('Location: account.php');
        }
    }

public function register()
    {
        session_start();
        $_SESSION['Message'] = '';
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: signup.php');
            exit();
        }
        if (isset($_SESSION['username'])) {
            header('Location: account.php');
            exit();
        }
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header('Location: signup.php');
            exit();
        }
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);

        $pdostatement = (new User())->authenticate($username);

        if ($pdostatement['username'] === $username) {
            $_SESSION['Message'] = 'Username already exists';
            $this->signout();
            header('Location: signup.php');
            exit();
        }
        $this->signout();
        $ok=$this->user->addUser($username,password_hash($password,PASSWORD_DEFAULT));
        if($ok)
        {
            $_SESSION['username'] = $username;
            header('Location: account.php');
        }
        else
        {
            $_SESSION['Message'] = 'Error';
            header('Location: signup.php');
        }
    }

    function changePassword()
    {
        session_start();
        $_SESSION['Message'] = '';
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: account.php');
            exit();
        }
        if(!isset($_SESSION['username']))
        {
            header('Location: signin.php');
            exit();
        }
        if (!isset($_POST['password']) || !isset($_POST['newPassword'])) {
            header('Location: account.php');
            exit();
        }
        $username=$_SESSION['username'];
        $password = htmlentities($_POST['password']);
        $newpassword = htmlentities($_POST['newPassword']);
        $pdostatement = (new User())->authenticate($username);

        if (!password_verify($password, $pdostatement['password'])) {
            $_SESSION['Message'] = 'Wrong password';
            header('Location: account.php');
            exit();
        }
        $ok=$this->user->changePassword($username,password_hash($newpassword,PASSWORD_DEFAULT));
        if($ok)
        {
            $_SESSION['Message'] = 'Password changed';
            header('Location: account.php');
        }
        else
        {
            $_SESSION['Message'] = 'Error';
            header('Location: account.php');
        }
    }
}