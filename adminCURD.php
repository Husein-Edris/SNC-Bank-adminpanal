<?php
include('security.php');

// add admin function

if(isset($_POST['addAdmin'])){

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['conPassword'];

    $email_query = "SELECT * FROM `admin` WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0){
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: admins.php');
    }
    else{
        if($password === $cpassword){
            $query = "INSERT INTO `admin` (`username`,phone,Email,`password`) VALUES ('$username','$phone','$email','$password')";
            $query_run = mysqli_query($connection, $query);

            if($query_run){
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: admins.php');
            }else{
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: admins.php');
            }
        }else{
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: admins.php');
        }
    }

}

/////////////

// edit admin data function

if(isset($_POST['update_admin'])){
    $id = $_POST['editid'];
    $username = $_POST['editname'];
    $phone = $_POST['editphone'];
    $email = $_POST['editemail'];
    $password = $_POST['editpassword'];

    $query = "UPDATE `admin` SET username='$username', phone='$phone', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: admins.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: admins.php'); 
    }
}

/////////////

// delete admin function

if(isset($_POST['delete_admin'])){
    $id = $_POST['deleteid'];

    $query = "DELETE FROM `admin` WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: admins.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: admins.php'); 
    }    
}


?>