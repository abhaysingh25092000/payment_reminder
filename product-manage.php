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
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products
                <a href="product-insert.php" class="btn btn-primary btn-sm float-end">
                  <i class="bi bi-person-plus-fill" style="margin-left:2px;"></i>
                  Add New Records
                </a>

                <a href="product-export.php" class="btn btn-warning btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-download"></i>
                  Export to Excel
                </a>

                <a href="product-import.php" class="btn btn-danger btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-upload"></i>
                  Import to Excel
                </a>

                <a href="product-pdf.php" class="btn btn-info btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-file-pdf-fill"></i>
                  PDF
                </a>
              </h5>

              <form class="d-flex" role="search" action="product-search.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-top:10px;width:20%;margin-left:75%;" name="search_value">
                <button class="btn btn-primary" type="submit" name="search_btn" style="margin-top:10px;"><i class="bi bi-search"></i></button>
              </form>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from products";
                $result=mysqli_query($conn,$sql);
                while($rows=mysqli_fetch_array($result))
                {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $rows['id'];?></th>
                    <td><?php echo $rows['product_name'];?></td>
                    <td><?php echo $rows['quantity'];?></td>
                    <td><?php echo $rows['price'];?></td>
                    <td><?php echo $rows['description'];?></td>
                    <td>
                      <a href="product-edit.php?id=<?php echo $rows['id'];?>" class="btn btn-success btn-sm">
                        <i class="bi bi-pen-fill"></i>
                      </a>

                      <a href="product-delete.php?id=<?php echo $rows['id'];?>" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash-fill"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
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
include('includes/footer.php');
include('includes/scripts.php');
?>

