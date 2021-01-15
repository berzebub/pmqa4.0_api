<?php
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$q_number = $data['q_number'];//ข้อที่
$json = $data['json'];
$avg_score = $data['avg_score'];
$a_avg_score = $data['a_avg_score'];
// $status = $data['status'];//สถานะของข้อ 0 ยังไม่ประเมิน 1 ประเมินแล้ว
// $indicators = $data['indicators'];//ตัวชี้วัด
// $goal = $data['goal'];//เป้าหมายประจำปี
// $success_rate = $data['success_rate'];//%ความสำเร็จ
// $score =$data['score'];//คะแนน
// $unit = $data['unit'];//หน่วย
$year = $data['year'];
// $score_standard = $data['score_standard'];
// $result = $data['result'];

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







// echo $result;

// $data_check = $db -> select("category7_log","*");

// if(count($data_check) > 0){
//     echo "update";
//     $db -> update("category7_log",
//     [
//     "status" => $status,
//     "indicators" => $indicators,
//     "goal" => $goal,
//      "success_rate" => $success_rate,
//     "score" => $score,
//     "unit" => $unit,
//     "score_standard" => $score_standard
//     ],
//     [
//     "user_id" => $user_id,
//     "q_number" => $q_number,
//     "year" => $year
//     ]);

// }else{
    
// $db -> insert("category7_log",
//     [
//         "user_id" => $user_id,
//         "q_number" => $q_number,
//         "status" => $status,
//         "indicators" => $indicators,
//         "goal" => $goal,
//         "success_rate" => $success_rate,
//         "score" => $score,
//         "unit" => $unit,
//         "result" => $result,
//          "score_standard" => $score_standard,
//          "year" => $year
//     ]);
// }

?>