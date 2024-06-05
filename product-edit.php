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
              <h5 class="card-title">Products Edit Form
                <a href="product-manage.php" class="btn btn-dark btn-sm float-end">BACK</a>
              </h5>
              
                    <?php
                    if(isset($_POST['update_btn']))
                    {
                      $id=$_POST['id'];
                      $product_name=$_POST['product_name'];
                      $quantity=$_POST['quantity'];
                      $price=$_POST['price'];
                      $description=$_POST['description'];

                      $sql="update products set product_name='$product_name',quantity='$quantity',
                      price='$price',description ='$description' where id='$id'";
                                              
                      $result=mysqli_query($conn,$sql);

                      if($result)
                      {
                        $_SESSION['success']="Data Updated Successfully";
                        echo "<script>window.location.href='product-manage.php'</script>";
                      }
                      else
                      {
                        echo "Data Not Updated Successfully";
                      }
                    }
                    else
                    {
                      $id=$_GET['id'];
                      $sql="select * from products where id='$id'";
                      $result=mysqli_query($conn,$sql);
                      $rows=mysqli_fetch_array($result);
                        ?>
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                              <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Product Name</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="product_name" value="<?php echo $rows['product_name'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Quantity</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control" name="quantity" value="<?php echo $rows['quantity'];?>">
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="validationCustomUsername" class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control" name="price" value="<?php echo $rows['price'];?>">
                                    <div class="invalid-feedback">
                                    Please Enter your Price
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                    <label for="validationCustomUsername" class="form-label">Description</label>
                                    <div class="input-group has-validation">
                                        <textarea class="form-control" name="description" cols="30" rows="5"><?php echo $rows['description'];?></textarea>
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
?>
