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
              <h5 class="card-title">Orders Insert Form
                <a href="order-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $product_name=$_POST['product_name'];
                      $order_delivered_from=$_POST['order_delivered_from'];
                      $order_delivered_to=$_POST['order_delivered_to'];
                      $order_delivered_by=$_POST['order_delivered_by'];
                      $quantity=$_POST['quantity'];
                      $price=$_POST['price'];
                      $phone=$_POST['phone'];
                      $status=$_POST['status'];

                      $sql="insert into orders (product_name,order_delivered_from,order_delivered_to,order_delivered_by,quantity,price,phone,status) 
                      values('$product_name','$order_delivered_from','$order_delivered_to','$order_delivered_by','$quantity','$price','$phone','$status')";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Created Successfully";
                        echo "<script>window.location.href='order-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Created Successfully";
                      }
                    }
                    else
                    {
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Product Name
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">From</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="order_delivered_from" required>
                                        <div class="invalid-feedback">
                                        Please Enter Order Delivered From
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">To</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="order_delivered_to" required>
                                    <div class="invalid-feedback">
                                    Please Enter Order Delivered To
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">By</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="order_delivered_by" required>
                                        <div class="invalid-feedback">
                                        Please Enter Order Delivered By
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="quantity" required>
                                        <div class="invalid-feedback">
                                        Please Enter any Quantity
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="price" required>
                                    <div class="invalid-feedback">
                                    Please Enter any Price
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="phone" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Phone Number
                                        </div>
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





                  

