<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$new_id = $data['sid'];

include 'config.php';

$sql = "SELECT * from user-api WHERE id = {$new_id}";

$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


if(mysqli_num_rows($result) > 0) {
 
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);
}
else{
 echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
 
?>