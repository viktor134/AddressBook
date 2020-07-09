<?php
include '../config/config.php';

$id=$_POST['id'];
$status_id=$_POST['status_id'];
//var_dump($id,$status_id);
$sql="UPDATE users SET status_id=? where id=? ";
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$status_id);
$statement->bindValue(2,$id);
$statement->execute();

header('Location:../index.php');
