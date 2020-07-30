<?php


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
$image_tmp = $_FILES['image']['tmp_name'];
$image = $_FILES['image']['name'];
$image=uploadImage($image_tmp,$image);

//var_dump($username);
createUser($username, $job_title, $phone_number, $address, $email,
    $password, $status_id, $social_vk, $social_telegram, $social_instagram, $image);



header("Location:../index.php");







