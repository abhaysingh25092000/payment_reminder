<?php
session_start();
include('dbconfig.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Bills</h1>
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
              <h5 class="card-title">Bills
                <a href="bill-list-insert.php" class="btn btn-primary btn-sm float-end">
                  <i class="bi bi-person-plus-fill" style="margin-left:2px;"></i>
                  Add New Records
                </a>

                <a href="bill-list-export.php" class="btn btn-warning btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-download"></i>
                  Export to Excel
                </a>

                <a href="bill-list-import.php" class="btn btn-danger btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-upload"></i>
                  Import to Excel
                </a>

                <a href="bill-list-pdf.php" class="btn btn-info btn-sm float-end" style="margin-right:5px;">
                  <i class="bi bi-file-pdf-fill"></i>
                  PDF
                </a>
              </h5>

              <form class="d-flex" role="search" action="register-search.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="margin-top:10px;width:20%;margin-left:75%;" name="search_value">
                <button class="btn btn-primary" type="submit" name="search_btn" style="margin-top:10px;"><i class="bi bi-search"></i></button>
              </form>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Describe</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Date</th>
                    <th scope="col">Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql="select * from bill_list";
                $result=mysqli_query($conn,$sql);
                while($rows=mysqli_fetch_array($result))
                {
                  $id=$rows['id'];
                  if($rows['status']==1)
                  $sts="<a href=bill-list-status.php?sts=0&id=$id><span class='badge text-bg-success'>Paid</span></a>";
                  if($rows['status']==0)
                  $sts="<a href=bill-list-status.php?sts=1&id=$id><span class='badge text-bg-danger'>Unpaid</span></a>";
                  ?>
                  <tr>
                    <th scope="row"><?php echo $rows['id'];?></th>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['description'];?></td>
                    <td><?php echo $rows['quantity'];?></td>
                    <td><?php echo $rows['unit_price'];?></td>
                    <td><?php echo $rows['subtotal'];?></td>
                    <td><?php echo $rows['date'];?></td>
                    <td><?php echo $rows['payment_method'];?></td>
                    <td><?php echo $sts;?></td>
                    <td>
                      <a href="bill-list-edit.php?id=<?php echo $rows['id'];?>" class="btn btn-success btn-sm">
                        <i class="bi bi-pen-fill"></i>
                      </a>

                      <a href="bill-list-delete.php?id=<?php echo $rows['id'];?>" class="btn btn-danger btn-sm">
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
include('includes/scripts.php');
include('includes/footer.php');
?>

