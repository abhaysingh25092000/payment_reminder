<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>User Management</h1>
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
              <h5 class="card-header">User Details
                <a href="register_manage.php" class="btn btn-secondary btn-sm float-end">BACK</a>
              </h5>
                <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Types</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_POST['search_btn']))
                                {
                                    $search = $_POST['search_value'];
                                    
                                    $sql = "SELECT * FROM register WHERE CONCAT(id,first_name,last_name,email,password,usertype,status) LIKE '%$search%'";
                                    $result = mysqli_query($connection,$sql);
                                    
                                    while($rows = mysqli_fetch_array($result))
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['id'];?></td>
                                            <td><?php echo $rows['first_name'];?></td>
                                            <td><?php echo $rows['last_name'];?></td>
                                            <td><?php echo $rows['email'];?></td>
                                            <td><?php echo $rows['password'];?></td>
                                            <td><?php echo $rows['usertype'];?></td>
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

  </main>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>