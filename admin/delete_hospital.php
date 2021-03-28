<?php
include '../connect.php';
$id = $_GET['id'];
$table = 'hospital';
$query = "DELETE FROM $table WHERE Hospital_ID=$id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
header('location: showDataOfHospital.php');
?>