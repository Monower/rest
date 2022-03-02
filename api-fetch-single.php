<?php 
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');


$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include 'config.php';

//$sql="select * from students";

$stmt=$conn->prepare("select * from students where id=?");
$stmt->execute([$student_id]);

$rownum=$stmt->rowCount();
//echo $rownum;

if ($rownum>0) {
    $result=$stmt->fetchAll();
    //print_r($result);
    echo json_encode($result);
}else{
    echo json_encode(array('message'=>'No Record Found.', 'Status'=>false));
}











?>