<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


/* $data=json_decode(file_get_contents("php://input"),true);
$search_value=$data['search']; */


$search_value=isset($_GET['search'])?$_GET['search']:die();

include 'config.php';



$stmt=$conn->prepare("select * from students where student_name like ?");
$stmt->execute(["%$search_value%"]);

$rownum=$stmt->rowCount();
//echo $rownum;

if ($rownum>0) {
    $result=$stmt->fetchAll();
    //print_r($result);
    echo json_encode($result);
}else{
    echo json_encode(array('message'=>'No Search Found.', 'Status'=>false));
}











?>