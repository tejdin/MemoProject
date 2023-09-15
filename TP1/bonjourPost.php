<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['firstName']) && isset($_POST['lastName']))
    {
        echo $_POST['firstName'] . "\n" ;
        echo $_POST['lastName'];
    }
    else
    {
        header('location: formulaire.html');
    }
}
else
{
    header('location: formulaire.html');

}
