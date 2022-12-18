<?php
// header('Content-Type: application/json');
// header('Access-Allow-Control-Method: POST');
// header('Access-Allow-Control-Origin: *');
// header('Access-Allow-Control-header: Access-Allow-Control-header, Access-Allow-Control-Method, Content-Type, 
// Authorization, X-Request-With ');
include 'conn.php';

// $data = json_decode(file_get_contents("php://input"), true);

echo $svalue = isset($_POST['search']) ? $_POST['search'] : die();


$sql = "select * from student where stu_name like '%$svalue%' ";
$result =$conn->query($sql);
if($result->num_rows>0){
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($rows);
}else{
    echo json_encode(array('message'=>'No records found', 'status'=>'false'));
}

?>