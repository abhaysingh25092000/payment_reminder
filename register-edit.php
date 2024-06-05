<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>User Management</h1>
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
              <h5 class="card-title">Users Edit Form
                <a href="register-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $id=$_POST['id'];
                      $name=$_POST['name'];
                      $email=$_POST['email'];
                      $password=$_POST['password']; 
                      $confirm_password=$_POST['confirm_password'];
                      $usertype=$_POST['usertype'];

                      if($password===$confirm_password)
                      {
                        $sql="insert into register (name,email,password,confirm_password,usertype) 
                        values ('$name','$email','$password','$confirm_password','$usertype')";
                          
                        $result=mysqli_query($conn,$sql);

                        if($result)
                        {
                          $_SESSION['success']="Data Updated Successfully";
                          echo "<script>window.location.href='register-manage.php'</script>";
                        }
                        else
                        {
                          echo "Data Not Updated Successfully";
                        }
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from register where id='$id'";
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
                                    <label for="validationCustomUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="email" value="<?php echo $rows['email'];?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Password</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="password" value="<?php echo $rows['password'];?>">
                                </div>
                            </div>

                            <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Confirm Password</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="confirm_password" value="<?php echo $rows['confirm_password'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Usertype</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="usertype" value="<?php echo $rows['usertype'];?>">
                                    </div>
                                </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="update_btn">Submit form</button>
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
include('includes/footer.php');
include('includes/scripts.php');
?>
