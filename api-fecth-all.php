<?php

header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');

include "conn.php";

$sql = "select * from student";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo $json_data = json_encode($output);
} else {

    echo json_encode(array('message' => 'No records found', 'status' => false));
}
