<?php
include('dbconfig.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="delete from customers where id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo "Data Deleted Successfully";
        header('Location: customer-manage.php');
    }
    else
    {
        echo "Data Not Deleted Successfully";
        header('Location: customer-manage.php');
    }
}
?>