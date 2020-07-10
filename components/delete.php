<?php 
require_once "../components/mainComponent.php";
$id=$_GET['id'];
editUser($id);
if (is_file('../public/uploads/' . $user->image)) {
    unlink('../public/uploads/' . $user->image);
}
$id=$_GET['id'];
$sql="DELETE FROM users WHERE id=?";
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();

header('Location:../index.php');