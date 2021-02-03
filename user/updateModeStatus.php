<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
$mode = $data['mode'];
$year = $data['year'];

// mode status = 0 ยังไม่ส่ง , 1 ส่งแล้ว

if($mode == 1){
    $mode = "mode1_status";
}else if ($mode == 2){
    $mode = "mode2_status";
}else if($mode == 3){
    $mode = "mode3_status";
}else {
    $mode = "mode4_status";
}


$db -> update("assessment_stepper_log",
[
    $mode => 1
],
[
    "year" => $year,
    "user_id" => $uid
]);



?>