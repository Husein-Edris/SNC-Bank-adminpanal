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
      <a class="nav-link " href="users.php">
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
            <h5 class="card-title">Users</h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Info</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "snc-database");
                    $query = "SELECT * FROM `users`";
                    $query_run = mysqli_query($connection, $query);
                    ?>
                    
                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      $tmpCount = 0;
                      while ($row = mysqli_fetch_assoc($query_run)){
                        $tmpCount ++;
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
                                <h5 class="modal-title" id="exampleModalLongTitle">User data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body ">
                                <div class="tab-pane fade show active profile-overview " id="profile-overview">
                                    <div class="row card-body profile-card pt-4 d-flex flex-column align-items-center">
                                      <img src="assets/img/<?php echo $row['image']; ?>" alt="Profile" class="userproImg rounded-circle ">
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label ">User ID</div>
                                      <div class="col-lg-9 col-md-8"><?php echo $row['id']; ?></div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                      <div class="col-lg-9 col-md-8"><?php echo $row['username']; ?></div>
                                    </div>
                  
                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Phone</div>
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

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Job</div>
                                      <div class="col-lg-9 col-md-8"><?php echo $row['jop']; ?></div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Salary</div>
                                      <div class="col-lg-9 col-md-8"><?php echo $row['salary']; ?></div>
                                    </div>
                
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!--------end user table------- -->
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