<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Bills</h1>
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
              <h5 class="card-title">Bills Edit Form
                <a href="bill-list-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $id=$_POST['id'];
                      $name=$_POST['name'];
                      $description=$_POST['description'];
                      $quantity=$_POST['quantity'];
                      $unit_price=$_POST['unit_price'];
                      $subtotal=$_POST['subtotal'];
                      $date=$_POST['date'];
                      $payment_method=$_POST['payment_method'];

                      $sql="update bill_list set name='$name',description='$description',quantity='$quantity',
                      unit_price='$unit_price',subtotal='$subtotal',date='$date',
                      payment_method='$payment_method' where id='$id'";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Updated Successfully";
                        echo "<script>window.location.href='bill-list-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Updated Successfully";
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from bill_list where id='$id'";
                      $result=mysqli_query($conn,$sql);
                      $rows=mysqli_fetch_array($result);
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                              <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="name" value="<?php echo $rows['name'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="quantity" value="<?php echo $rows['quantity'];?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="unit_price" value="<?php echo $rows['unit_price'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Subtotal</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="subtotal" value="<?php echo $rows['subtotal'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Date</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="date" value="<?php echo $rows['date'];?>">
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Payment Method</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="payment_method" value="<?php echo $rows['payment_method'];?>">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="validationCustomUsername" class="form-label">Description</label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="description" style="width:80px;"><?php echo $rows['description'];?></textarea>
                                    </div>
                                </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
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

