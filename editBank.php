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
      <a class="nav-link" href="banks.php">
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
            <h5 class="card-title">Edit Banks</h5>
            <?php
            if(isset($_POST['editBank'])){

                $id = $_POST['editid'];
                $query = "SELECT * FROM `bank` WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>
                    <!-- -------new data------- -->
                        <form  action="banksCURD.php" method="POST">
                            <input type="hidden" name="editid" value="<?php echo $row['id'] ?>">

                            <div class="col-12">
                                <label for="bankName" class="form-label">bankName</label>
                                <input type="text" name="editbank" value="<?php echo $row['bankname'] ?>" class="form-control" id="Bank Name" required>
                                <div class="invalid-feedback">Please, enter The Bank Name!</div>
                            </div>

                            <div class="col-12">
                                <label for="location" class="form-label">location</label>
                                <input type="text" name="editlocation" value="<?php echo $row['location'] ?>" class="form-control" id="location" required>
                                <div class="invalid-feedback">Please, enter a valid location!</div>
                            </div>

                            <div class="col-12">
                                <label for="location" class="form-label">location</label>
                                <input type="text" name="edittype" value="<?php echo $row['type'] ?>" class="form-control" id="type" required>
                                <div class="invalid-feedback">Please, enter a valid location!</div>
                            </div>
      
                            <div class="col-12">
                                <label for="interest" class="form-label">interest</label>
                                <input type="number" name="editinterest" value="<?php echo $row['interest'] ?>" step="any" class="form-control" id="interest" required>
                                <div class="invalid-feedback">Please enter a valid Interest!</div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update_bank" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    <!-- -------new data------- -->
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