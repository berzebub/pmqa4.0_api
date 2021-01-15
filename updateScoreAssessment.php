<?php 
require("connection.php");

$data = $_POST;

$user_id = $data['user_id']; //
$step = $data['step'];
$q_number = $data['q_number']; //ข้อที่
$year = $data['year'];//ปี
$a_score = $data['a_score'];
$suggesstion_basic = $data['suggesstion_basic'];
$suggesstion_advance = $data['suggesstion_advance'];
$suggesstion_significance = $data['suggesstion_significance'];
$basic_checkbox = $data['basic_checkbox'];
$advance_checkbox = $data['advance_checkbox'];
$significance_checkbox = $data['significance_checkbox'];
$category = $data['category'];
$a_avg_score = $data['a_avg_score'];

// echo $user_id;
// echo $step;
// echo $q_number;
// echo $year;
// echo $a_score;
// echo $suggesstion_basic;
// echo $suggesstion_advance;
// echo $suggesstion_significance;
// echo $basic_checkbox;
// echo $advance_checkbox;

// echo $significance_checkbox;



$check_basic = $db -> select("category1_6_log","*",
[
    "step" => $step,
    "q_number" => $q_number,
    "mode" => "basic",
    "user_id" => $user_id
]);

$check_advance = $db -> select("category1_6_log","*",
[
    "step" => $step,
    "q_number" => $q_number,
    "mode" => "advance",
    "user_id" => $user_id
]);

$check_significance = $db -> select("category1_6_log","*",
[
    "step" => $step,
    "q_number" => $q_number,
    "mode" => "significance",
    "user_id" => $user_id
]);

if(count($check_basic)){
    $db -> update("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_basic,
        "a_check_box" => $basic_checkbox
    ],
    [
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "basic",
        "user_id" => $user_id
    ]);

}else{
    $db -> insert("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_basic,
        "a_check_box" => $basic_checkbox,
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "basic",
        "user_id" => $user_id,
        "year" => $year
    ]);
}


if(count($check_advance)){
    $db -> update("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_advance,
        "a_check_box" => $advance_checkbox
    ],
    [
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "advance",
        "user_id" => $user_id
    ]);

}else{

    $db -> insert("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_advance,
        "a_check_box" => $advance_checkbox,
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "advance",
        "user_id" => $user_id,
        "year" => $year
    ]);

}

if(count($check_significance)){
    $db -> update("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_significance,
        "a_check_box" => $significance_checkbox
    ],
    [
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "significance",
        "user_id" => $user_id
    ]);

}else{

    $db -> insert("category1_6_log",
    [
        "a_score" => $a_score,
        "suggesstion" => $suggesstion_significance,
        "a_check_box" => $significance_checkbox,
        "step" => $step,
        "q_number" => $q_number,
        "mode" => "significance",
        "user_id" => $user_id,
        "year" => $year
    ]);

}

$db -> update("assessment_log",
[
    $category => $a_avg_score
],
[
    "user_id" => $user_id,
    "year" => $year
]);







  

?>