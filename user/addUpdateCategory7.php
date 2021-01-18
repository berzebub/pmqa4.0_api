<?php
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$q_number = $data['q_number'];//ข้อที่
$json = $data['json'];
$avg_score = $data['avg_score'];
$a_avg_score = $data['a_avg_score'];
$year = $data['year'];
if(isset($data['totala_avg_score'])){
    $totala_avg_score = $data['totala_avg_score'];
}

$check_exists = $db -> select("category7_log","*",
[
    "user_id" => $user_id,
    "q_number" => $q_number,
    "year" => $year,
]);

if(count($check_exists)){
    $db -> update("category7_log",
[
        "user_id" => $user_id,
        "q_number" => $q_number,
        "year" => $year,
        "json" => $json,
        "avg_score" => $avg_score,
        "a_avg_score" => $a_avg_score
],
[
    "user_id" => $user_id,
    "q_number" => $q_number,
    "year" => $year,
]);

}else{
$db -> insert("category7_log",
[
        "user_id" => $user_id,
        "q_number" => $q_number,
        "year" => $year,
        "json" => $json,
        "avg_score" => $avg_score,
        "a_avg_score" => $a_avg_score
]);

}



$db ->update("assessment_log",
        [
            "a_category7_score" => $totala_avg_score
        ],
        [
            "user_id" => $user_id,
            "year" => $year-543
        ]
        );


?>