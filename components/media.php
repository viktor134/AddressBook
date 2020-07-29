<?php
require_once "../components/mainComponent.php";

$id = $_POST['id'];
if(!empty($_FILES['image']['tmp_name'])){
$image_tmp = $_FILES['image']['tmp_name'];
$image = $_FILES['image']['name'];
$user=getUser($id);
$image=updateImage($image_tmp,$user,$image);
updateMedia($id,$image);
}
header("Location:../index.php");
