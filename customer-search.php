<?php
session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Customer Management</h1>
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
              <h5 class="card-header">Customer Details
                <a href="customer_manage.php" class="btn btn-secondary btn-sm float-end">BACK
              </a>
              </h5>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Pin Code</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['search_btn']))
                {
                    $search = $_POST['search_value'];
                    $sql = "SELECT * FROM customers WHERE CONCAT(id,name,gender,email,address,city,state,phone,pin_code) LIKE '%$search%'";
                    $result = mysqli_query($connection,$sql);
                    while($rows = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['gender'];?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td><?php echo $rows['address'];?></td>
                        <td><?php echo $rows['city'];?></td>
                        <td><?php echo $rows['state'];?></td>
                        <td><?php echo $rows['phone'];?></td>
                        <td><?php echo $rows['pin_code'];?></td>
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