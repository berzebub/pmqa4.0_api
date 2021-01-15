<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$avg_score = $data['avg_score'];
$year = $data['year'];
$office_score = $data['office_score'];
$assessor_score = -1;
$category1_score = $data['category1_score'];
$category2_score = $data['category2_score'];
$category3_score = $data['category3_score'];
$category4_score = $data['category4_score'];
$category5_score = $data['category5_score'];
$category6_score = $data['category6_score'];
$category7_score = $data['category7_score'];

$date = date("Y/m/d");

$check_exists = $db -> select("assessment_log","*",
[
    "user_id" => $user_id,
    "year" => $year
]);

if(count($check_exists)){
    $db -> update("assessment_log",
    [
        "office_score" => $office_score,
        "assessor_score" => $assessor_score,
        "category1_score" => $category1_score,
        "category2_score" => $category2_score,
        "category3_score" => $category3_score,
        "category4_score" => $category4_score,
        "category5_score" => $category5_score,
        "category6_score" => $category6_score,
        "category7_score" => $category7_score,
        "send_assessment_date" => $date
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);
    
}else{
    $db -> insert("assessment_log",
    [
        "user_id" => $user_id,
        "office_score" => $office_score,
        "assessor_score" => $assessor_score,
        "year" => $year,
        "category1_score" => $category1_score,
        "category2_score" => $category2_score,
        "category3_score" => $category3_score,
        "category4_score" => $category4_score,
        "category5_score" => $category5_score,
        "category6_score" => $category6_score,
        "category7_score" => $category7_score,
        "send_assessment_date" => $date
    ]);
}


?>