<?php
include('dbconfig.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="delete from bill_list where id='$id'";
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        echo "Data Deleted Successfully";
        header("Location: bill-list-manage.php");
    }
    else
    {
        echo "Data Not Deleted Successfully";
        header("Location: bill-list-manage.php");
    }
}
?>