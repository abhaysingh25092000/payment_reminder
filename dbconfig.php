<?php
$conn=mysqli_connect("localhost","root","","payment_reminder");
if(!$conn)
{
    die('connection Failed'.mysqli_connect_error());
}
?>