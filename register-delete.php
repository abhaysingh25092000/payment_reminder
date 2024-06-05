<?php
session_start();
include('connect.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql="delete from register where id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        $_SESSION['success']="Data Deleted Successfully";
        echo "<script>window.location.href='register-manage.php'</script>";
    }
    else
    {
        $_SESSION['status']="Data Not Deleted";
        echo "<script>window.location.href='register-manage.php'</script>";
    }
}
?>