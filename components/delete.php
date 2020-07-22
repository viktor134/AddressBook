<?php 
require_once "../components/mainComponent.php";
$id=$_GET['id'];
$user=getUser($id);
removeImage($user);
removeUsers($id);

header('Location:../index.php');