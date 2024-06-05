<?php
include('dbconfig.php');
$id= $_GET['id'];
$sts=$_GET['sts'];

$sql="update bill_list set status='$sts' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result)
{
    header('Location: bill-list-manage.php');
}
?>