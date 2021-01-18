<?php 
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['uid'];
$step = $data['step'];
$year = $data['year'];
$step_value = $data['stepValue'];


$checkExists = $db -> select("assessment_stepper_log","*",
[
    "user_id" => $uid
]);


if(count($checkExists) == 0){
    $db -> insert("assessment_stepper_log",
    [
        "user_id" => $uid,
        "op" => 0,
        "cat1_6" => 0,
        "cat7_gap" => 0,
        "plan_1y" => 0,
        "plan_3y" => 0,
        "month_6" => 0,
        "cat7" => 0,
        "month_12" => 0,
        "sum_month_12" => 0,
        "mode1_status" => 0,
        "mode2_status" => 0,
        "mode3_status" => 0,
        "mode4_status" => 0,
        "year" => $year
    ]);

 
}

   
$db -> update("assessment_stepper_log",
[
    $step => $step_value
],
[
    "user_id" => $uid,
    "year" => $year
]);

?>
