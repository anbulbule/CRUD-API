<?php
    
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-control-Allow-Origin: *');
    header('Access-control-Allow-header: Content-Type, Access-Control-Allow-Method, Access-control-Allow-header');

    // X-Requested-With - security purpose, its only allows ajax data;

    include('conn.php');

    $data = json_decode(file_get_contents("php://input"),true);

    $sname = $data['stu_name'];
    $semail = $data['email'];
    $spassword = $data['password'];

        if($sname==""  && $semail=="" && $spassword=="" ){

            echo json_encode(array('message' => 'data not inserted successfully', 'status'=> 'false' ));

        }else{

        $sql = "insert into student (stu_name,email,password) values('$sname','$semail','$spassword')";

        if($result = $conn->query($sql)){
            echo json_encode(array('message'=>'data inserted successfully','status'=>'true'));
        }else{
            echo json_encode(array('message' => 'data not inserted successfully', 'status'=> 'false' ));
        }
    }


?>