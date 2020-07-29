<?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "address_book";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


function getStatus()
{
    global $pdo;
    $sql = "SELECT * FROM status";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_OBJ);

}

function uploadImage($image_tmp)
{


    $image = $_FILES['image']['name'];
    if (is_uploaded_file($image_tmp)) {
        move_uploaded_file($image_tmp, "../public/uploads/" . $image);
        return $image;
    }
}

function updateImage($image_tmp, $user)
{
    //global $image, $image_tmp;
    if (is_uploaded_file($image_tmp)) {
        if (is_file('../public/uploads/' . $user->image)) {
            unlink('../public/uploads/' . $user->image);
        }
        $image = $_FILES['image']['name'];

        move_uploaded_file($image_tmp, '../public/uploads/' . $image);
        return $image;

    }
}

function removeImage($user)
{

    if (is_file('../public/uploads/' . $user->image)) {
        unlink('../public/uploads/' . $user->image);

    }

}

function createUser($username, $job_title, $phone_number, $address, $email,
                    $password, $status_id, $social_vk, $social_telegram, $social_instagram, $image)
{
    global $pdo;
    $sql = "INSERT INTO users(username,job_title,phone_number,
address,email,password,status_id,social_vk,social_telegram,social_instagram,image)
VALUES(:username,:job_title,:phone_number,
:address,:email,:password,:status_id,:social_vk,:social_telegram,:social_instagram,:image)";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        'username' => $username,
        'job_title' => $job_title,
        'phone_number' => $phone_number,
        'address' => $address,
        'email' => $email,
        'password' => md5($password),
        'status_id' => $status_id,
        'social_vk' => $social_vk,
        'social_telegram' => $social_telegram,
        'social_instagram' => $social_instagram,
        'image' => $image,


    ]);

}

function removeUsers($id)
{
    global $pdo;
    $sql = "DELETE FROM users WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
}

function getUsers()
{
    global $pdo;
    $sql = "SELECT * FROM users";
    $statemnt = $pdo->prepare($sql);
    $statemnt->execute();
    return $statemnt->fetchAll(PDO::FETCH_OBJ);

}

function getUser($id)
{
    global $pdo;
    $sql = 'SELECT * FROM users where id=?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
}

function editUser($id)
{
    global $pdo;
    $sql = 'SELECT * FROM users where id=?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);


}










