<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Customers</h1>
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
              <h5 class="card-title">Customers Edit Form
                <a href="customer-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $id=$_POST['id'];
                      $name=$_POST['name'];
                      $gender=$_POST['gender'];
                      $email=$_POST['email'];
                      $address=$_POST['address'];
                      $city=$_POST['city'];
                      $state=$_POST['state'];
                      $phone=$_POST['phone'];
                      $pin_code=$_POST['pin_code'];

                      $sql="update customers set name='$name',gender='$gender',email='$email',
                      address='$address',city='$city',state='$state',phone='$phone',
                      pin_code='$pin_code' where id='$id'";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Updated Successfully";
                        echo "<script>window.location.href='customer-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Updated Successfully";
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from customers where id='$id'";
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
                                    <label for="validationCustomUsername" class="form-label">Gender</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="gender" value="<?php echo $rows['gender'];?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Address</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="address" value="<?php echo $rows['address'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">City</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="city" value="<?php echo $rows['city'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">State</label>
                                    <div class="input-group has-validation">
                                      <select class="form-control" name="state" value="<?php echo $rows['state'];?>" aria-label="Default select example">    
                                        <option value="Delhi">Delhi</option>
                                        <option value="J.K.">J.K.</option>
                                        <option value="Uttarakand">Uttarakhand</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="U.P.">U.P.</option>
                                        <option value="H.P.">H.P.</option>
                                        <option value="A.P.">A.P.</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="M.P.">M.P.</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Kerela">Kerela</option>
                                        <option value="Telengana">Telangana</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Chattisgarh">Chattisgarh</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="A.P.">A.P.</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="West Bengal">West Bengal</option>
                                      </select>
                                  </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="phone" value="<?php echo $rows['phone'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Pin Code</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" name="pin_code" value="<?php echo $rows['pin_code'];?>">
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



                                                     