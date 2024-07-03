<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];
$hashed_password = md5($password);

include 'config.php';

$sql = "INSERT INTO user_api(name, email, password) VALUES ('{$name}', '{$email}', '{$password}');";

if(mysqli_query($conn, $sql)) {
 
  echo json_encode(array('message' => 'Record Saved successfully', 'status' => true));    
}
else{
 echo json_encode(array('message' => 'Records are not Saved.', 'status' => false));
}
 
?> 