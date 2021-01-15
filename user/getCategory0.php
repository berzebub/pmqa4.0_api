<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'];
$user_id = $data['user_id'];

$get_data = $db -> select("category0_log","*",
[
    "user_id" => $user_id,
    "year" => $year
]);

// for($i=0;$i<count($get_data);$i++){
//     $result[$i]['q_number'] = $get_data[$i]['q_number'];
//     $result[$i]['category'] = $get_data[$i]['category'];
//     $result[$i]['category_q_number'] = $get_data[$i]['category_q_number'];
//     $result[$i]['text'] = $get_data[$i]['text'];
//     $result[$i]['is_img'] = $get_data[$i]['is_img'];
//     $result[$i]['is_pdf'] = $get_data[$i]['is_pdf'];
// }


echo json_encode($get_data);
?>