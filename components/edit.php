<?php
include "../config/config.php";
include  "../components/mainComponent.php";

$id=$_POST['id'];
$username = $_POST['username'];
$job_title = $_POST['job_title'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

//var_dump($id,$username,$job_title,$phone_number,$address);
editInformation($id,$username,$job_title,$phone_number,$address);



header('Location:../index.php');

