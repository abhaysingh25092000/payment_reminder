<?php
include('dbconfig.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="delete from sales where id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo "Data Deleted Successfully";
        header("Location: sales-manage.php");
    }
    else
    {
        echo "Data Not Deleted Successfully";
        header("Location: sales-manage.php");
    }
}
?>