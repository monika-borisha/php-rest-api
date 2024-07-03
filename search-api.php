<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['uid'];

include 'config.php';

$sql = "DELETE FROM user_api WHERE id = {$id}";

if(mysqli_query($conn, $sql)) {
 
  echo json_encode(array('message' => 'Record Deleted successfully', 'status' => true));    
}
else{
 echo json_encode(array('message' => 'Records are not Deleted.', 'status' => false));
}
 
