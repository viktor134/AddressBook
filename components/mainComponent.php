<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "address_book";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


function getStatus()
{
    global $pdo;
    $sql = "SELECT * FROM status";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    global $statuses;
    $statuses = $statement->fetchAll(PDO::FETCH_OBJ);

}

function uploadImage($image_tmp)
{

    global $image;
    $image = $_FILES['image']['name'];
    if (is_uploaded_file($image_tmp)) {
        move_uploaded_file($image_tmp, "../public/uploads/" . $image);
        return $image;
    }
}

function updateImage($image_tmp){
    global $image, $image_tmp;
    if(is_uploaded_file($image_tmp)){
        $image=$_FILES['image']['name'];
        
    }
}

function getUser()
{
    global $pdo;
    $sql = "SELECT * FROM users";
    $statemnt = $pdo->prepare($sql);
    $statemnt->execute();
    global $users;
    $users = $statemnt->fetchAll(PDO::FETCH_OBJ);

}
function  editUser($id)
{
    global $pdo;
    $sql = 'SELECT * FROM users where id=?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1,$id);
    $statement->execute();
    global $user;
    $user = $statement->fetch(PDO::FETCH_OBJ);
    

}










