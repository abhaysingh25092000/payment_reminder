<?php 
include('dbconfig.php');
$id = $_GET['id'];
$sts = $_GET['sts'];

$sql="update sales set status='$sts' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result)
{
    header("location: sales-manage.php");
}

?>