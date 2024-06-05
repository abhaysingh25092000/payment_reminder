<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
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
              <h5 class="card-title">Products Insert Form
                <a href="product-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $product_name=$_POST['product_name'];
                      $quantity=$_POST['quantity'];
                      $price=$_POST['price'];
                      $description=$_POST['description'];

                      $sql="insert into products (product_name,quantity,price,description) 
                      values('$product_name','$quantity','$price','$description')";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Created Successfully";
                        echo "<script>window.location.href='product-manage.php'</script>";
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
                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Product Name
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="quantity" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Quantity
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="price" required>
                                    <div class="invalid-feedback">
                                    Please Enter your Price
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                    <label for="validationCustomUsername" class="form-label">Description</label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="description" cols="30" rows="5"></textarea>
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