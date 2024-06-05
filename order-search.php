<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Orders</h1>
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
              <h5 class="card-header">Orders
                <a href="order_insert.php" class="btn btn-secondary btn-sm float-end">BACK</a>
              </h5>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Order From</th>
                    <th scope="col">Order To</th>
                    <th scope="col">Order By</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search_btn']))
                {
                    $search = $_POST['search_value'];
                    $sql = "SELECT * FROM orders WHERE CONCAT(id,product_name,order_delivered_from,order_delivered_to,order_delivered_by,quantity,price,phone,status) LIKE '%$search%'";
                    $result = mysqli_query($connection,$sql);

                    while($rows = mysqli_fetch_array($result))
                    {
                        $order_id=$rows['id'];
                        if($rows['status']==1)
                        $sts="<a href=order_status.php?sts=0&id=$order_id>Delivered</a>";
                        if($rows['status']==0)
                        $sts="<a href=order_status.php?sts=1&id=$order_id>Not Delivered</a>";
                        ?>
                        <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['order_delivered_from'];?></td>
                        <td><?php echo $rows['order_delivered_to'];?></td>
                        <td><?php echo $rows['order_delivered_by'];?></td>
                        <td><?php echo $rows['quantity'];?></td>
                        <td><?php echo $rows['price'];?></td>
                        <td><?php echo $rows['phone'];?></td>
                        <td><?php echo $sts?></td>
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