<?php
include "../config/config.php";
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$confrim=$_POST['confrim'];

if(!empty($email)){
   $sql="UPDATE users SET email=? WHERE id=?";
   $statement=$pdo->prepare($sql);
   $statement->bindValue(1,$email);
   $statement->bindValue(2,$id);
   $statement->execute();

}
if(!empty($password && $confrim)){
    if($password==$confrim){
        $password=md5($password);
        $sql="UPDATE users SET password=? WHERE id=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$password);
        $statement->bindValue(2,$id);
        $statement->execute();
    }
}

header('Location:../index.php');