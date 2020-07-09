<?php
include "../config/config.php";

$id=$_POST['id'];
$username = $_POST['username'];
$job_title = $_POST['job_title'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

//var_dump($id,$username,$job_title,$phone_number,$address);

if(!empty($username)){
    $sql="UPDATE users SET username=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$username);
    $statement->bindValue(2,$id);
    $statement->execute();

}
if(!empty($job_title)){
    $sql="UPDATE users SET job_title=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$job_title);
    $statement->bindValue(2,$id);
    $statement->execute();

}
if(!empty($phone_number)){
    $sql="UPDATE users SET phone_number=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$phone_number);
    $statement->bindValue(2,$id);
    $statement->execute();

}
if(!empty($address)){
    $sql="UPDATE users SET address=? WHERE id=?";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$address);
    $statement->bindValue(2,$id);
    $statement->execute();

}


header('Location:../index.php');

