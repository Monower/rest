<?php 
header('Content-Type: application/json'); //this tells we are showing json type data
header('Access-Control-Allow-Origin: *'); //this allows other platforms or application to use the api
header('Access-Control-Allow-Methods: POST'); //this specifies with which mthod we will insert data into db
header('Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With'); //this specifies which headers we are useing
//Authorization means other applications can access this api
//x requested with means that we will only allow data pass with ajax



$data=json_decode(file_get_contents("php://input"/* this reads any raw data */),true/* this returns the data as an associative arry */);
$name=$data['sname'];
$age=$data['sage'];
$city=$data['scity'];


include 'config.php';

//$sql="select * from students";

$stmt=$conn->prepare("insert into students(student_name,age,city) values(?,?,?)");
$result=$stmt->execute([$name,$age,$city]);




if ($result) {
    echo json_encode(array('message'=>'student record inserted', 'status'=>true));
}else{
    echo json_encode(array('message'=>'student record not inserted.', 'Status'=>false));
}











?>