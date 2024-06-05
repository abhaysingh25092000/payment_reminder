<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Layouts</h1>
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
                                        $product_id = $_GET['id'];
                                        $sql = "SELECT * FROM products WHERE id='$product_id'";
                                        $result = mysqli_query($connection,$sql); 

                                        while($rows = mysqli_fetch_array($result))
                                        {
                                            ?>
                                            <section class="section">
                                            <div class="row">
                                              <div class="col-md-12">

                                                <div class="card">
                                                  <div class="card-body">
                                                    <h5 class="card-header">Product Details
                                                      <a href="product_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
                                                    </h5>
                                                      <form class="row g-3" action="" method="POST">
                                                      <div class="col-md-12">
                                                      <label>Product Name</label>
                                                      <p class="form-control">
                                                      <?php echo $rows['product_name'];?>
                                                      </p>
                                                      </div>
                                                      
                                                      <div class="mb-3">
                                                      <label>Quantity</label>
                                                      <p class="form-control">
                                                      <?php echo $rows['quantity'];?>
                                                      </p>
                                                      </div>
                                                      
                                                      <div class="mb-3">
                                                      <label>Price</label>
                                                      <p class="form-control">
                                                      <?php echo $rows['price'];?>
                                                      </p>
                                                      </div>

                                                      <div class="mb-3">
                                                      <label>Description</label>
                                                      <p class="form-control">
                                                      <?php echo $rows['description'];?>
                                                      </p>
                                                      </div>
                                                      
                                                      </form>
                                            <?php
                                          }
                                       }
                                    ?>

                                  </main>
                                        
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
