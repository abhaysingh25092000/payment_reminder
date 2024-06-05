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
              <h5 class="card-title">Bills Insert Form
                <a href="bill-list-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $name=$_POST['name'];
                      $description=$_POST['description'];
                      $quantity=$_POST['quantity'];
                      $unit_price=$_POST['unit_price'];
                      $subtotal=$_POST['subtotal'];
                      $date=$_POST['date'];
                      $payment_method=$_POST['payment_method'];

                      $sql="insert into bill_list (name,description,quantity,unit_price,subtotal,date,payment_method) 
                      values('$name','$description','$quantity','$unit_price','$subtotal','$date','$payment_method')";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Created Successfully";
                        echo "<script>window.location.href='bill-list-manage.php'</script>";
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
                                    <label for="validationCustomUsername" class="form-label">Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="name" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Name
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="quantity" required>
                                    <div class="invalid-feedback">
                                    Please Enter your Quantity
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="unit_price" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Unit Price
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Subtotal</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="subtotal" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Subtotal
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Date</label>
                                    <div class="input-group has-validation">
                                    <input type="date" class="form-control" name="date" required>
                                    <div class="invalid-feedback">
                                    Please Enter your Date
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Payment Method</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="payment_method" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Payment Method
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="validationCustomUsername" class="form-label">Description</label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="description" style="width:80px;" required></textarea>
                                        <div class="invalid-feedback">
                                        Please Enter your Description
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

                    
  