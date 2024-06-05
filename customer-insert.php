<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Categories</h1>
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
              <h5 class="card-title">Category Insert Form
                <a href="customer-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['submit']))
                    {
                      $name=$_POST['name'];
                      $gender=$_POST['gender'];
                      $email=$_POST['email'];
                      $address=$_POST['address'];
                      $city=$_POST['city'];
                      $state=$_POST['state'];
                      $phone=$_POST['phone'];
                      $pin_code=$_POST['pin_code'];

                      $sql="insert into customers (name,gender,email,address,city,state,phone,pin_code) 
                      values ('$name','$gender','$email','$address','$city','$state','$phone',$pin_code)";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Created Successfully";
                        echo "<script>window.location.href='customer-manage.php'</script>";
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
                                    <label for="validationCustomUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Email Address
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Address</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="address" required>
                                    <div class="invalid-feedback">
                                    Please Enter your Address
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">City</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="city" required>
                                        <div class="invalid-feedback">
                                        Please Enter your City
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">State</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="state" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Phone Number
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Mobile</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="phone" required>
                                    <div class="invalid-feedback">
                                    Please Enter your City
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Pin Code</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="pin_code" required>
                                        <div class="invalid-feedback">
                                        Please Enter your Pin Code
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