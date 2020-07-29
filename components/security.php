<?php
include "../config/config.php";
include  "../components/mainComponent.php";
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];

editSecurity($id,$email,$password,$confirm);

header('Location:../index.php');