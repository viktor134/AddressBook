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

function uploadImage($image_tmp, $image)
{
    if (is_uploaded_file($image_tmp)) {
        move_uploaded_file($image_tmp, "../public/uploads/" . $image);
        return $image;
    }
}

function updateImage($image_tmp, $user,$image)
{
    //global $image, $image_tmp;
    if (is_uploaded_file($image_tmp)) {
        if (is_file('../public/uploads/' . $user->image)) {
            unlink('../public/uploads/' . $user->image);
        }


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
    if(!empty($username)){
        $sql="INSERT INTO users  username=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$username);
        $statement->execute();

    }
    if(!empty($job_title)){
        $sql="INSERT INTO  users  job_title=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$job_title);
        $statement->execute();

    }
    if(!empty($phone_number)){
        $sql="INSERT INTO users  phone_number=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$phone_number);
        $statement->execute();

    }
    if(!empty($address)){
        $sql="INSERT INTO users  address=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$address);
        $statement->execute();

    }
    if(!empty($email)){
        $sql="INSERT INTO  users  email=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$email);
        $statement->execute();

    }
    if(!empty($password)){
        $sql="UPDATE users SET address=? WHERE id=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$address);
        $statement->execute();
}
    if(!empty($status_id)) {
        $sql = "UPDATE users SET address=? WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $address);
        $statement->execute();
    }
    if(!empty($social_vk)) {
        $sql = "UPDATE users SET address=? WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $address);
        $statement->execute();
    }
    if(!empty($social_instagram)) {
        $sql = "UPDATE users SET address=? WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $address);
        $statement->execute();
    }
    if(!empty($social_telegram)) {
        $sql = "UPDATE users SET address=? WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $address);
        $statement->execute();
    }
    if(!empty($image)) {
        $sql = "UPDATE users SET address=? WHERE id=?";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $address);
        $statement->execute();
    }

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
function editSecurity($id,$email,$password,$confirm)
{
    global  $pdo;
    if(!empty($email)){
        $sql="UPDATE users SET email=? WHERE id=?";
        $statement=$pdo->prepare($sql);
        $statement->bindValue(1,$email);
        $statement->bindValue(2,$id);
        $statement->execute();

    }
    if(!empty($password && $confirm)){
        if($password==$confirm){
            $password=md5($password);
            $sql="UPDATE users SET password=? WHERE id=?";
            $statement=$pdo->prepare($sql);
            $statement->bindValue(1,$password);
            $statement->bindValue(2,$id);
            $statement->execute();
        }
    }
}

function  editStatus($id,$status_id){
    global  $pdo;
    $sql="UPDATE users SET status_id=? where id=? ";
    $statement=$pdo->prepare($sql);
    $statement->bindValue(1,$status_id);
    $statement->bindValue(2,$id);
    $statement->execute();

}
function updateMedia($id,$image){
    global $pdo;
    $sql = "UPDATE users SET image=? WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $image);
    $statement->bindValue(2, $id);
    $statement->execute();
}










