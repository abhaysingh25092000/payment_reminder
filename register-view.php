<?php
session_start();
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
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

              <?php
              if(isset($_GET['id']))
              {
                $id = $_GET['id'];
                $sql = "SELECT * FROM register WHERE id='$id'";
                $result = mysqli_query($connection,$sql); 

                while($rows = mysqli_fetch_array($result))
                {
                  ?>
                  <section class="section">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-header">User Details
                            <a href="register_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
                          </h5>

                          <form class="row g-3">

                          <div class="col-md-12">
                            <label for="">First Name</label>
                            <p class="form-control">
                              <?php echo $rows['first_name'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Last Name</label>
                            <p class="form-control">
                              <?php echo $rows['last_name'];?>
                            </p>
                          </div>
                          
                          <div class="col-md-12">
                            <label for="">Email</label>
                            <p class="form-control">
                              <?php echo $rows['email'];?>
                            </p>
                          </div>
                          
                          <div class="col-12">
                            <label for="">Password</label>
                            <p class="form-control">
                              <?php echo $rows['password'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Confirm Password</label>
                            <p class="form-control">
                              <?php echo $rows['confirm_password'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">User Types</label>
                            <p class="form-control">
                              <?php echo $rows['usertype'];?>
                            </p>
                          </div>
                          
                          <div class="col-md-12">
                            <label for="">Status</label>
                            <p class="form-control">
                              <?php echo $rows['status'];?>
                            </p>
                          </div>

                          </form>

                      </div>
                    </div>
                  </div>
                </div>
          </div>
              </section>
                  <?php
                }
              }
              ?>

  </main><!-- End #main -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
