<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE'); 
header('Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


$data=json_decode(file_get_contents("php://input"),true);
$student_id=$data['sid'];

include 'config.php';


$stmt=$conn->prepare("delete from students where id=?");
$result=$stmt->execute([$student_id]);


//echo $rownum;

if ($result) {
    echo json_encode(array('message'=>'Record Deleted Successfully.', 'Status'=>true));
}else{
    echo json_encode(array('message'=>'Record Not Deleted Successfully.', 'Status'=>false));
}











?>