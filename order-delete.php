<!----------Order delete--------->
<?php
include('dbconfig.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql="delete from orders where id='$id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        echo "Data Deleted Successfully";
        header("Location: order-manage.php");
    }
    else
    {
        echo "Ddata Not Deleted Successfully";
        header("Location: order-manage.php");
    }
}
?>