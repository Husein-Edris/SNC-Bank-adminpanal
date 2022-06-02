<?php
include('security.php');

// -------- checking the data --------

if(isset($_POST['loginbtn']))
{
    $email_login = $_POST['loginEmail']; 
    $password_login = $_POST['password']; 

    // -------- checking query --------
    $query = "SELECT * FROM `admin` WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
   } 
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
   }
    
}
?>