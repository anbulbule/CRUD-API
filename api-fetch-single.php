<?php

header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');

include "conn.php";


$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['sid'];

$sql = "select * from student where stu_id = '$student_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No records found', 'status' => false));
}
