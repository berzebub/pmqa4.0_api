<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'];
$user_id = $data['user_id'];
$step = $data['step']; //หมวดที่
$data = $db -> select("category1_6_log","*",
[
    "user_id" => $user_id,
    "year" => $year,
    "step" => $step,
]);

for($i=0;$i<count($data);$i++){
    $result[$i]['step'] = $data[$i]['step'];
    $result[$i]['q_number'] = $data[$i]['q_number'];
    $result[$i]['mode'] = $data[$i]['mode'];
    $result[$i]['text'] = $data[$i]['text'];
    $result[$i]['check_box'] = $data[$i]['check_box'];
    $result[$i]['is_pdf'] = $data[$i]['is_pdf'];
    $result[$i]['is_img'] = $data[$i]['is_img'];
}

echo json_encode($result);
?>