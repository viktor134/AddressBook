<?php
require_once "../components/mainComponent.php";

$id = $_POST['id'];
if(!empty($_FILES['image']['tmp_name'])){


$image_tmp = $_FILES['image']['tmp_name'];
updateImage($image_tmp);
editUser($id);
if (is_file('../public/uploads/' . $user->image)) {
    unlink('../public/uploads/' . $user->image);
}

move_uploaded_file($image_tmp, '../public/uploads/' . $image);


    $sql = "UPDATE users SET image=? WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $image);
    $statement->bindValue(2, $id);
    $statement->execute();
    
}

//problemm fix no upload image edit your image

header("Location:../index.php");
