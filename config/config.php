<?php
//config database
$servername="localhost";
$username="root";
$password="root";
$dbname="address_book";

$pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

//echo "connection success";


