<?php
require_once "../components/mainComponent.php";

$id = $_POST['id'];
if(!empty($_FILES['image']['tmp_name'])){
$image_tmp = $_FILES['image']['tmp_name'];
$user=getUser($id);
$image=updateImage($image_tmp,$user);


    $sql = "UPDATE users SET image=? WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $image);
    $statement->bindValue(2, $id);
    $statement->execute();
    
}



header("Location:../index.php");
