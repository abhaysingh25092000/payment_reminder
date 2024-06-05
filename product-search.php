<?php
session_start();
include('security.php');
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
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-header">Products
                <a href="product_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
              </h5>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search_btn']))
                {
                    $search = $_POST['search_value'];
                    $sql = "SELECT * FROM products WHERE CONCAT(id,product_name,quantity,price,description) LIKE '%$search%'";
                    $result = mysqli_query($connection,$sql);
                    while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['quantity'];?></td>
                        <td><?php echo $rows['price'];?></td>
                        <td><?php echo $rows['description'];?></td>
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
//include('security.php');
include('includes/scripts.php');
include('includes/footer.php');
?>