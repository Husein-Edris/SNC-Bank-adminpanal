<?php
include('security.php');
include('includes/header.php');
include('includes/nav-bar.php');
?>
<li></li>
<li></li>
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
      <a class="nav-link " href="admins.php">
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
      <a class="nav-link collapsed" href="banks.php">
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
            <h5 class="card-title">Admins</h5>

            <!-- Add admin -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add new admin
            </button>

            <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" action="adminCURD.php" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add new admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="adminCURD.php" method="POST">
                    <div class="modal-body">
                      <div class="col-12">
                        <label for="yourName" class="form-label">Name</label>
                        <input type="text" name="username" class="form-control" id="yourName" required>
                        <div class="invalid-feedback">Please, enter The name!</div>
                      </div>

                      <div class="col-12">
                        <label for="yourName" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="yourName" required>
                        <div class="invalid-feedback">Please, enter a valid phone num!</div>
                      </div>

                      <div class="col-12">
                        <label for="yourEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Confirm password</label>
                        <input type="password" name="conPassword" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please Confirm your password!</div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="addAdmin" class="btn btn-primary">Add new admin</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- end add admin -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Info</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $connection = mysqli_connect("localhost", "root", "", "snc-database");
                $query = "SELECT * FROM `admin`";
                $query_run = mysqli_query($connection, $query);
                ?>

                <?php
                if (mysqli_num_rows($query_run) > 0) {
                  $tmpCount = 0;
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    $tmpCount++;
                ?>
                    <tr>
                      <th scope="row"><?php echo $tmpCount; ?></th>
                      <td><?php echo $row['username']; ?></td>
                      <td>
                        <!-- ------show data------- -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">
                          Show data
                        </button>

                        <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Admin data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Admin ID</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['id']; ?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['username']; ?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone number</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['phone']; ?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['email']; ?></div>
                                  </div>

                                  <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Password</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $row['password']; ?></div>
                                  </div>



                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- ------show data------- -->
                      </td>
                      <td>
                        <!-- ---------edit data--------- -->
                        <form action="editAdmin.php" method="post">
                          <input type="hidden" name="editid" value="<?php echo $row['id']; ?>">
                          <button type="submit" name="editadmin" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>">
                            Edit
                          </button>
                        </form>


                        <!-- ---------edit data--------- -->
                      </td>
                      <td>
                        <!-- --------------delete data-------------- -->
                        <form action="adminCURD.php" method="post">
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
                                Are you sure you want to delete "<?php echo $row['username']; ?>" from admins ?

                              </div>
                              <div class="modal-footer">
                                <form action="adminCURD.php" method="post">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="hidden" name="deleteid" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="delete_admin" class="btn btn-primary">Yes, Delete</button>
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