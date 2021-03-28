<?php
include '../connect.php';
$id = $_GET['id'];
$table = 'bloodbank';
$query = "DELETE FROM $table WHERE BloodBank_ID=$id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
header('location: showDataOfBloodBank.php');
?>

