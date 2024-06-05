<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Orders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Validation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders Edit Form
                <a href="order-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $id=$_POST['id'];
                      $product_name=$_POST['product_name'];
                      $order_delivered_from=$_POST['order_delivered_from'];
                      $order_delivered_to=$_POST['order_delivered_to'];
                      $order_delivered_by=$_POST['order_delivered_by'];
                      $quantity=$_POST['quantity'];
                      $price=$_POST['price'];
                      $phone=$_POST['phone'];
                      $status=$_POST['status'];

                      $sql="update orders set product_name='$product_name',order_delivered_from='$order_delivered_from',
                      order_delivered_to='$order_delivered_to',order_delivered_by='$order_delivered_by'
                      ,quantity='$quantity',price='$price',phone='$phone',status='$status' where id='$id'";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Updated Successfully";
                        echo "<script>window.location.href='order-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Updated Successfully";
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from orders where id='$id'";
                      $result=mysqli_query($conn,$sql);
                      $rows=mysqli_fetch_array($result);
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                              <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $rows['product_name'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">From</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="order_delivered_from" value="<?php echo $rows['order_delivered_from'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">To</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="order_delivered_to" value="<?php echo $rows['order_delivered_to'];?>">
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">By</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="order_delivered_by" value="<?php echo $rows['order_delivered_by'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="quantity" value="<?php echo $rows['quantity'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="price" value="<?php echo $rows['price'];?>">
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $rows['phone'];?>">
                                    </div>
                                </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="update_btn">Update form</button>
                            </div>
                            </form><!-- End Custom Styled Validation -->
                        <?php
                    }
                    ?>

            </div>
        </div>
    </div>
</div>
</section>

</main><!-- End #main -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

