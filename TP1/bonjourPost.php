<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo $_GET['firstName'] . "\n" ;
    echo $_GET['lastName'];
}
else
{
    header('location: formulaire.html');

}
