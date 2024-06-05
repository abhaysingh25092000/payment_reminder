<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Bills Management</h1>
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
              <h5 class="card-header">List Of Bills
                <a href="bill_list_manage.php" class="btn btn-secondary btn-sm float-end">BACK
                </a>
              </h5>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">No</th>
                    <th scope="col">Invoice Date</th>
                    <th scope="col">Product</th>
                    <th scope="col">Describe</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search_btn']))
                {
                  $search = $_POST['search_value'];
                  $sql = "SELECT * FROM bill_list WHERE CONCAT(id,invoice_no,invoice_date,name,description,quantity,unit_price,subtotal,date,payment_method) LIKE '%$search%'";
                  $result = mysqli_query($connection,$sql);
                  while($rows = mysqli_fetch_array($result))
                  {  
                    ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['invoice_no'];?></td>
                        <td><?php echo $rows['invoice_date'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['description'];?></td>
                        <td><?php echo $rows['quantity'];?></td>
                        <td><?php echo $rows['unit_price'];?></td>
                        <td><?php echo $rows['subtotal'];?></td>
                        <td><?php echo $rows['date'];?></td>
                        <td><?php echo $rows['payment_method'];?></td>
                        <td><?php echo $rows['status'];?></td>
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
include('includes/scripts.php');
include('includes/footer.php');
?>