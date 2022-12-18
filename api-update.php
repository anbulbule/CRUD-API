<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Access-Control-Allow-Origin, Access-Control-Allow-Method, 
Content-Type');

include 'conn.php';
$data = json_decode(file_get_contents("php://input"),true);
$sid = $data['sid'];
$sname = $data['sname'];
$semail = $data['semail'];
$spassword = $data['spassword'];


$sql ="update student set stu_name='$sname',email='$semail',password='$spassword' where stu_id='$sid'";
if($result =$conn->query($sql)){
    echo json_encode(array('message'=>'data updated successfully', 'status'=>'true'));
}else{
    echo json_encode(array('message'=>'data failed to update', 'status'=>'false'));
}


?>