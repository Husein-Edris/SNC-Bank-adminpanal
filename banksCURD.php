<?php
include('security.php');

// add Bank function

if(isset($_POST['addBank'])){

    $bankname = $_POST['bankname'];
    $banklocation = $_POST['banklocation'];
    $banktype = $_POST['banktype'];
    $bankintrest = $_POST['bankintrest'];

    $query = "INSERT INTO `bank` (bankName,`location`,`type`,interest) VALUES ('$bankname','$banklocation','$banktype','$bankintrest')";

    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['status'] = "Bank Added";
        $_SESSION['status_code'] = "success";
        header('Location: banks.php');
    }else{
        $_SESSION['status'] = "Bank Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: banks.php');
    }

}

// edit Bank data function

if(isset($_POST['update_bank'])){
    $id = $_POST['editid'];
    $bankName = $_POST['editbank'];
    $location = $_POST['editlocation'];
    $type = $_POST['edittype'];
    $interest = $_POST['editinterest'];

    $query = "UPDATE `bank` SET bankName='$bankName', `location`='$location', `type`='$type',interest='$interest' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: banks.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: banks.php'); 
    }
}

// delete Bank function

if(isset($_POST['delete_bank'])){
    $id = $_POST['deleteid'];

    $query = "DELETE FROM `bank` WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: banks.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: banks.php'); 
    }    
}

?>