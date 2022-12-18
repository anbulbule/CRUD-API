<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Access-Control-Allow-Origin, Access-Control-Allow-Method,
Content-Type,Authorization, X-Requested-With');

include 'conn.php';

$data = json_decode(file_get_contents("php://input"), true);
$stu_id = $data['sid'];

$sql = "delete from student where stu_id = '$stu_id'";
if ($result = $conn->query($sql)) {
    echo json_encode(array('message' => 'data deleted successfully', 'status' => 'true'));
} else {
    echo json_encode(array('message' => 'failed to delete data', 'status' => 'false'));
}
