<?php
$connection = mysqli_connect('localhost','root','','inventory');

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>