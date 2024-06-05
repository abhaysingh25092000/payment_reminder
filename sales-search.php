<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Sales Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
              <h5 class="card-header">Sales
                <a href="sales_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
              </h5>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Last</th>
                    <th scope="col">Price</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Submit</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search_btn']))
                {
                    $search = $_POST['search_value'];
                    $sql = "SELECT * FROM sales WHERE CONCAT(id,customer_name,product_name,quantity,issue_date,last_date,price,tax_amount,submission_date) LIKE '%$search%'";
                    $result = mysqli_query($connection,$sql);
                    while($rows = mysqli_fetch_array($result))
                    {
                    $sales_id=$rows['id'];
                    if($rows['status']==1)
                    $sts="<a href=sales_status.php?sts=0&id=$sales_id>Paid</a>";
                    if($rows['status']==0)
                    $sts="<a href=sales_status.php?sts=1&id=$sales_id>Unpaid</a>";
                    ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['customer_name'];?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['quantity'];?></td>
                        <td><?php echo $rows['issue_date'];?></td>
                        <td><?php echo $rows['last_date'];?></td>
                        <td><?php echo $rows['price'];?></td>
                        <td><?php echo $rows['tax_amount'];?></td>
                        <td><?php echo $rows['submission_date'];?></td>
                        <td><?php echo $sts?></td>
                    </tr>
                    <?php
                    }
                }
                else
                {
                  echo "No Results Found";
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