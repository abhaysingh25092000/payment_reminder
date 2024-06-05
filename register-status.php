<?php 
include('dbconfig.php');
$id=$_GET['id'];
$sts=$_GET['sts'];

$sql="update register set status='$sts' where id='$id'";
$result=mysqli_query($conn,$sql);

if($result)
{
    header("location: register-manage.php");
}

?>