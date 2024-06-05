<?php 
session_start();
include('dbconfig.php');
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
                                        <section class="section">
                                          <div class="row">
                                            <div class="col-md-12">

                                              <div class="card">
                                                <div class="card-body">
                                                  <h5 class="card-header">Order Details
                                                    <a href="order_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
                                                  </h5>

                                                  <?php
                                                  if (isset($_FILES['import_file']))
                                                  {
                                                    move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);  

                                                    echo "Upload: " . $_FILES["file"]["name"] . "<br>";

                                                    echo "Type: " . $_FILES["file"]["type"] . "<br>";

                                                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

                                                    echo "Stored in: " . $_FILES["file"]["tmp_name"];
                                                  }
                                                  else
                                                  {
                                                    ?>
                                                    <!-- No Labels Form -->
                                                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                                    
                                                    <div class="col-md-12">
                                                      <label for="">Files:</label>
                                                      <input type="file" class="form-control" name="file">
                                                    </div>
                                                      
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary" name="import_file">Submit</button>
                                                    </div>
                                                    </form><!-- End No Labels Form -->
                                                    <?php
                                                  }
                                                  ?>
                                                  

                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </section>
</main>

                                        <?php
                                        include('includes/header.php');
                                        include('includes/footer.php');
                                        ?>