<?php
include '../connect.php';
//$message ='';
    $Satue_Donation = 1;
    $id = $_GET['id'];
    $idDonor = $_GET['idDonor'];  ;
    $LastDateOfDonation = date("Y-m-d");
    $query_update = "UPDATE activity SET Satue_Donation = '$Satue_Donation' WHERE Activity_ID = '$id'";
    $query_update = "UPDATE donor SET Donation_statue = '1', LastDateOfDonation = '208-5-23' WHERE Donor_ID = '8'";
    $result_update = mysqli_query($connect, $query_update)or mysql_errno();
             print_r($result_update);
    $query_update = "SELECT * FROM activity WHERE Activity_ID=$id";
    $result_update = mysqli_query($connect, $query_update);
    $row = mysqli_fetch_assoc($result_update);
   // header('location: situation.php');
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';

echo $message;

?>