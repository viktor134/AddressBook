<?php
require_once "config/config.php";
//print_r($_GET);
$search=$_GET['js-filter-contacts'];
$sql="SELECT * FROM users WHERE username LIKE '$search%'";
$statement=$pdo->prepare($sql);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC)){
  echo "$result[username] <br>";

  

}



?>