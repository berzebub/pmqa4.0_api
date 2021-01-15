<?php 
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];
$db -> update("user_stepper_log",
[
    "send_status" => 0
],
[
    "user_id" => $user_id,
    "year" => $year
]);

$db -> update("assessment_log",
[
    "office_score" => -1,
    "assessor_score" => -1
],
[
    "user_id" => $user_id,
    "year" => $year
]);


?>