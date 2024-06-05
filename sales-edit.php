<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sales</h1>
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
              <h5 class="card-title">Sales Edit Form
                <a href="sales-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $id=$_POST['id'];
                      $customer_name=$_POST['customer_name'];
                      $product_name=$_POST['product_name'];
                      $quantity=$_POST['quantity'];
                      $issue_date=$_POST['issue_date'];
                      $last_date=$_POST['last_date'];
                      $price=$_POST['price'];
                      $tax_amount=$_POST['tax_amount'];

                      $sql="update sales set customer_name='$customer_name',product_name='$product_name',
                      quantity='$quantity',issue_date='$issue_date',last_date='$last_date',
                      price='$price',tax_amount='$tax_amount' where id='$id'";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Updated Successfully";
                        echo "<script>window.location.href='sales-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Updated Successfully";
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from sales where id='$id'";
                      $result=mysqli_query($conn,$sql);
                      $rows=mysqli_fetch_array($result);
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                              <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Customer Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="customer_name" value="<?php echo $rows['customer_name'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $rows['product_name'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="quantity" value="<?php echo $rows['quantity'];?>">
                                </div>
                              </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Issue Date</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" name="issue_date" value="<?php echo $rows['issue_date'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Last Date</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" name="last_date" value="<?php echo $rows['last_date'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="price" value="<?php echo $rows['price'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Tax Amount</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="tax_amount" value="<?php echo $rows['tax_amount'];?>">
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
