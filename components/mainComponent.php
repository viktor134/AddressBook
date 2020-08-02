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
    if (!empty($username)) {
        $sql = "INSERT INTO users (username)  values (:username)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "username" => $username,
        ]);

    }


    if(!empty($job_title)){
        $sql="INSERT INTO  users(job_title)  VALUES (:job_title)";
        $statement=$pdo->prepare($sql);
        $statement->execute([
            "job_title"=>$job_title
        ]);

    }
    if(!empty($phone_number)){
        $sql="INSERT INTO users(phone_number)  values (:phone_number)";
        $statement=$pdo->prepare($sql);
        $statement->execute([
            "phone_number"=>$phone_number
        ]);

    }
    if(!empty($address)){
        $sql="INSERT INTO users(address)  values (:address)";
        $statement=$pdo->prepare($sql);
        $statement->execute([
            "address"=>$address
        ]);

    }
    if(!empty($email)){
        $sql="INSERT INTO  users(email)  values (:email)";
        $statement=$pdo->prepare($sql);
        $statement->execute([
            "email"=>$email
        ]);

    }
    if(!empty($password)){
        $sql="INSERT INTO users(password) values (:password)";
        $statement=$pdo->prepare($sql);
        $statement->execute([
            "password"=>$password
        ]);
    }
    if(!empty($status_id)) {
        $sql = "INSERT INTO users(status_id) values(:status_id)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "status_id"=>$status_id
        ]);
    }
    if(!empty($social_vk)) {
        $sql = "INSERT INTO users(social_vk) values(:social_vk)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "social_vk"=>$social_vk
        ]);
    }
    if(!empty($social_instagram)) {
        $sql = "INSERT INTO users(social_instagram) values (:social_instagram) ";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "social_instagram"=>$social_instagram
        ]);
    }
    if(!empty($social_telegram)) {
        $sql = "INSERT INTO  users(social_telegram)  values (:social_telegram)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "social_telegram"=>$social_telegram
        ]);
    }
    if(!empty($image)) {
        $sql = "INSERT INTO users(image) values(:image)";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            "image"=>$image
        ]);
    }

}

function removeUsers($id)
{
    global $pdo;
    $sql = "DELETE FROM users WHERE id=?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute([]);
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
function editInformation($id,$username,$job_title,$phone_number,$address)
{
    global  $pdo;
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
}










