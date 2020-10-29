<?php
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$q_number = $data['q_number'];//ข้อที่
$status = $data['status'];//สถานะของข้อ 0 ยังไม่ประเมิน 1 ประเมินแล้ว
$indicators = $data['indicators'];//ตัวชี้วัด
$goal = $data['goal'];//เป้าหมายประจำปี
$success_rate = $data['success_rate'];//%ความสำเร็จ
$score =$data['score'];//คะแนน
$unit = $data['unit'];//หน่วย
$year = $data['year'];
$score_standard = $data['score_standard'];

$check_exists = $db -> select("category7_log","*",
[
    "user_id" => $user_id,
    "q_number" => $q_number,
    "year" => $year
]);

echo count($check_exists);


if(count($check_exists) > 0){
    echo "update";
    $db -> update("category7_log",
    [
    "status" => $status,
    "indicators" => $indicators,
    "goal" => $goal,
     "success_rate" => $success_rate,
    "score" => $score,
    "unit" => $unit,
    "score_standard" => $score_standard
    ],
    [
    "user_id" => $user_id,
    "q_number" => $q_number,
    "year" => $year
    ]);

}else{
    echo "insert";
$db -> insert("category7_log",
    [
        "user_id" => $user_id,
        "q_number" => $q_number,
        "status" => $status,
        "indicators" => $indicators,
        "goal" => $goal,
        "success_rate" => $success_rate,
        "score" => $score,
        "unit" => $unit,
         "score_standard" => $score_standard,
         "year" => $year
    ]);
}

?>