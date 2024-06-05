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
              <h5 class="card-title">Sales Insert Form
                <a href="sales-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $customer_name=$_POST['customer_name'];
                      $product_name=$_POST['product_name'];
                      $quantity=$_POST['quantity'];
                      $issue_date=$_POST['issue_date'];
                      $last_date=$_POST['last_date'];
                      $price=$_POST['price'];
                      $tax_amount=$_POST['tax_amount'];

                      $sql="insert into sales (customer_name,product_name,quantity,issue_date,last_date,price,tax_amount) 
                      values('$cusotmer_name','$product_name','$quantity','$issue_date','$last_date','$price','$tax_amount')";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Created Successfully";
                        echo "<script>window.location.href='sales-manage.php'</script>";
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
                                    <label for="validationCustomUsername" class="form-label">Customer Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="customer_name" required>
                                        <div class="invalid-feedback">
                                        Please Enter Customer Name
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" required>
                                        <div class="invalid-feedback">
                                        Please Enter Product Name
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

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Issue Date</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" name="issue_date" required>
                                        <div class="invalid-feedback">
                                        Please Enter Issue Date
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Last Date</label>
                                    <div class="input-group has-validation">
                                        <input type="date" class="form-control" name="last_date" required>
                                        <div class="invalid-feedback">
                                        Please Enter Last Date
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
                                    <label for="validationCustomUsername" class="form-label">Tax Amount</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="tax_amount" required>
                                    <div class="invalid-feedback">
                                    Please Enter Tax Amount
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





                  

