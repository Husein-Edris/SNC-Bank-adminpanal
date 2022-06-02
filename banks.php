<?php
include('security.php');
include('includes/header.php'); 
include('includes/nav-bar.php'); 
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav " id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="admins.php">
        <i class="bi bi-person-lines-fill"></i>
        <span>Admins</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="users.php">
        <i class="bi bi-person-fill"></i>
        <span>Users</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link " href="banks.php">
        <i class="bi bi-bank"></i>
        <span>Banks</span>
      </a>
    </li><!-- End Dashboard Nav -->

  </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Banks</h5>
          
          <!-- Add Bank -->
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add new bank
            </button>
            
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add new bank</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="banksCURD.php" method="POST">
                      <div class="modal-body">
                              <div class="col-12">
                                <label for="yourName" class="form-label">Bank name</label>
                                <input type="text" name="bankname" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">Please, enter The name!</div>
                              </div>

                              <div class="col-12">
                                <label for="yourName" class="form-label">Bank location</label>
                                <input type="text" name="banklocation" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">Please, enter The location!</div>
                              </div>

                              
                              <div class="col-12">
                                <label for="yourName" class="form-label">Bank type</label>
                                <input type="text" name="banktype" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">Please, enter The type of the bank!</div>
                              </div>


                              <div class="col-12">
                                <label for="yourName" class="form-label">Bank Intrest</label>
                                <input type="number" name="bankintrest" class="form-control" id="yourName" step="any" required>
                                <div class="invalid-feedback">Please, enter a valid number!</div>
                              </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addBank" class="btn btn-primary">Add new bank</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          <!-- end add Bank -->

          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">location</th>
                <th scope="col">type</th>
                <th scope="col">intrest</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  $connection = mysqli_connect("localhost", "root", "", "snc-database");
                  $query = "SELECT * FROM `bank`";
                  $query_run = mysqli_query($connection, $query);
                  ?>

                   <?php
                  if (mysqli_num_rows($query_run) > 0) {
                    $tmpCount = 0;
                    while ($row = mysqli_fetch_assoc($query_run)){
                      $tmpCount ++;
                  ?>
                      <tr>
                        <!-- ---------show data-------- -->
                      <th scope="row"><?php echo $tmpCount; ?></th>
                      <td><?php echo $row['bankname']; ?></td>
                      <td><?php echo $row['location']; ?></td>
                      <td><?php echo $row['type']; ?></td>
                      <td><?php echo $row['interest']; ?></td>
                        <!-- ---------show data-------- -->
                      <td>
                        <!-- ---------edit data--------- -->
                        <form action="editBank.php" method="post">
                          <input type="hidden" name="editid" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="editBank" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>">
                            Edit
                          </button>
                        </form>


                        <!-- ---------edit data--------- -->
                      </td>
                      <td>
                        <!-- --------------delete data-------------- -->
                        <form action="banksCURD.php" method="post">
                          <input type="hidden" name="aaa" value="<?php echo $row['id']; ?>">
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $row['id']; ?>">
                            Delete
                          </button>
                        </form>


                        <div class="modal fade" id="delete<?php echo $row['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete "<?php echo $row['bankname']; ?>" from Banks ?

                              </div>
                              <div class="modal-footer">
                                <form action="banksCURD.php" method="post">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="hidden" name="deleteid" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="delete_bank" class="btn btn-primary">Yes, Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- --------------delete data-------------- -->
                      </td>
                    </tr>
              <?php
                  }
                } else {
                  echo "No Record Found";
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
include('includes/script.php');
?>