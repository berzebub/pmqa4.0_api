<?php 
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$avg_score = $data['avg_score'];
$year = $data['year'];
$assessor_id = $data['assessor_id'];


$result[0]['date'] = date("d");
$result[0]['month'] = date("m");
$result[0]['year'] = date("Y") + 543;



$db -> update("assessment_log",
[
    "assessor_score" => $avg_score,
    "assessor_id" => $assessor_id,
],
[
    "user_id" => $user_id,
    "year" => $year
]);
?>