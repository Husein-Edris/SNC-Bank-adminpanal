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
            <h5 class="card-title">Edit Admin</h5>
            <?php
            if(isset($_POST['editadmin'])){

                $id = $_POST['editid'];
                $query = "SELECT * FROM `admin` WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>
                        <form  action="adminCURD.php" method="POST">
                            <input type="hidden" name="editid" value="<?php echo $row['id'] ?>">

                            <div class="col-12">
                                <label for="yourName" class="form-label">Name</label>
                                <input type="text" name="editname" value="<?php echo $row['username'] ?>" class="form-control" id="yourName" required >
                                <div class="invalid-feedback">Please, enter The name!</div>
                            </div>

                            <div class="col-12">
                                <label for="yourName" class="form-label">Phone</label>
                                <input type="text" name="editphone" value="<?php echo $row['phone'] ?>" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">Please, enter a valid phone numper!</div>
                            </div>
      
                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Email</label>
                                <input type="email" name="editemail" value="<?php echo $row['email'] ?>" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                            </div>
      
                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="editpassword" value="<?php echo $row['password'] ?>" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Please enter your password!</div>
                            </div>

                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update_admin" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        <?php

                }

            }
            ?>
            

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