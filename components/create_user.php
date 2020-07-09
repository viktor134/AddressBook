<?php

//require "../config/config.php";
require "../components/mainComponent.php";

$username = $_POST['username'];
$job_title = $_POST['job_title'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$status_id = $_POST['status_id'];
$social_vk = $_POST['social_vk'];
$social_telegram = $_POST['social_telegram'];
$social_instagram = $_POST['social_instagram'];
$image_tmp=$_FILES['image']['tmp_name'];

uploadImage($image_tmp);





//var_dump($username,$job_title,$phone_number,$address,$email,
//    $password,$status_id,$social_vk,$social_instagram,$social_telegram);  //tested  post data

$sql = "INSERT INTO users(username,job_title,phone_number,
address,email,password,status_id,social_vk,social_telegram,social_instagram,image)
VALUES(:username,:job_title,:phone_number,
:address,:email,:password,:status_id,:social_vk,:social_telegram,:social_instagram,:image)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'username' => $username,
    'job_title' => $job_title,
    'phone_number' => $phone_number,
    'address'=>$address,
    'email'=>$email,
    'password'=>md5($password),
    'status_id'=>$status_id,
    'social_vk'=>$social_vk,
    'social_telegram'=>$social_telegram,
    'social_instagram'=>$social_instagram,
    'image'=>$image,



]);




header("Location:../index.php");

