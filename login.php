<?php
session_start();
include('includes/header.php');  
?>

<main>
     <div class="container">

          <section
               class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                              <div class="d-flex justify-content-center py-4">
                                   <a href="index.html" class="logo d-flex align-items-center w-auto">
                                        <a href="index.php" class="logo d-flex align-items-center">
                                             <span class="snc-logo snc-logo-login d-none d-lg-block">SNC</span>
                                        </a>
                                   </a>
                              </div><!-- End Logo -->

                              <div class="card mb-3">

                                   <div class="card-body">

                                        <div class="pt-4 pb-2">
                                             <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                             <p class="text-center small">Enter your Email & password to login</p>
                                        </div>

                                        <?php
                      if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                        
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);

                      }
                  ?>

                                        <!-- --------login form--------- -->
                                        <form class="row g-3 needs-validation" action="loginCURD.php" method="POST"
                                             novalidate>

                                             <div class="col-12">
                                                  <label for="yourUsername" class="form-label">Email</label>
                                                  <div class="input-group has-validation">
                                                       <input type="Email" name="loginEmail" class="form-control"
                                                            id="yourUsername" required>
                                                       <div class="invalid-feedback">Please enter your Email.</div>
                                                  </div>
                                             </div>

                                             <div class="col-12">
                                                  <label for="yourPassword" class="form-label">Password</label>
                                                  <input type="password" name="password" class="form-control"
                                                       id="yourPassword" required>
                                                  <div class="invalid-feedback">Please enter your password!</div>
                                             </div>

                                             <div class="col-12">
                                                  <button class="btn btn-primary w-100" type="submit"
                                                       name="loginbtn">Login</button>
                                             </div>
                                             <div></div>
                                             <div></div>
                                        </form>
                                        <!-- --------login form--------- -->

                                   </div>
                              </div>

                         </div>
                    </div>
               </div>

          </section>

     </div>
</main><!-- End #main -->

<?php
include('includes/script.php');
?>