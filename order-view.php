<?php
session_start();
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
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

              <?php
              if(isset($_GET['id']))
              {
                $order_id = $_GET['id'];
                $sql = "SELECT * FROM orders WHERE id='$order_id'";
                $result = mysqli_query($connection,$sql); 

                while($rows = mysqli_fetch_array($result))
                {
                  ?>
                  <section class="section">
                  <div class="row">
                    <div class="col-md-12">

                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-header">Order Details
                            <a href="order_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
                          </h5>

                          <form class="row g-3">

                          <div class="col-md-12">
                            <label for="">Product Name</label>
                            <p class="form-control">
                              <?php echo $rows['product_name'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Order Delivered From</label>
                            <p class="form-control">
                              <?php echo $rows['order_delivered_from'];?>
                            </p>
                          </div>
                          
                          <div class="col-md-12">
                            <label for="">Order Delivered To</label>
                            <p class="form-control">
                              <?php echo $rows['order_delivered_to'];?>
                            </p>
                          </div>
                          
                          <div class="col-12">
                            <label for="">Order Delivered By</label>
                            <p class="form-control">
                              <?php echo $rows['order_delivered_by'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Quantity</label>
                            <p class="form-control">
                              <?php echo $rows['quantity'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Price</label>
                            <p class="form-control">
                              <?php echo $rows['price'];?>
                            </p>
                          </div>

                          <div class="col-md-12">
                            <label for="">Phone</label>
                            <p class="form-control">
                              <?php echo $rows['phone'];?>
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
