<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$uid = $data['user_id'];
$year = $data['year'];
$data = $db ->select("assessment_stepper_log","*",
[
    "user_id" => $uid,
    "year" => $year
]);

echo json_encode($data);
?>