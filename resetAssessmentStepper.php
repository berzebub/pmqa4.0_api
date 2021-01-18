<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['userId'];
$year = $data['year'];
$mode = $data['mode'];


if($mode == '1'){

    $db -> update("assessment_stepper_log",
    [
        "op" => 0,
        "cat1_6" => 0,
        "mode1_status" => 0
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);

}else if ($mode == '2'){
    $db -> update("assessment_stepper_log",
    [
        "cat7_gap" => 0,
        "plan_1y" => 0,
        "plan_3y" => 0,
        "mode2_status" => 0
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);

}else if ($mode == '3'){
    $db -> update("assessment_stepper_log",
    [
        "month_6" => 0,
        "mode3_status" => 0
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);

}else{

    $db -> update("assessment_stepper_log",
    [
        "cat7" => 0,
        "month_12" => 0,
        "sum_month_12" => 0,
        "mode4_status" => 0
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);
    
}


echo "success";
?>