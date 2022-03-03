<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include 'config.php';

//$sql="select * from students";

$stmt=$conn->prepare("select * from students");
$stmt->execute();

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