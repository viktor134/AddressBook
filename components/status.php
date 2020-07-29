<?php
include '../config/config.php';
include  '../components/mainComponent.php';

$id=$_POST['id'];

$status_id=$_POST['status_id'];

editStatus($id,$status_id);

header('Location:../index.php');
