<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['uid'];
$name = $data['name'];
$email = $data['email'];
$password = $data['password'];

$hashed_password = password_hash($password,PASSWORD_DEFAULT);

include 'config.php';

$sql = "UPDATE user_api SET name = '{$name}', email = '{$email}', password = '{$hashed_password}' WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {
 
  echo json_encode(array('message' => 'Record Updated successfully', 'status' => true));    
}
else{
 echo json_encode(array('message' => 'Records are not Updated.', 'status' => false));
}
 
