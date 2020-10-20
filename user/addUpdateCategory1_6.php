<?php 
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id']; //
$step = $data['step'];
$q_number = $data['q_number']; //ข้อที่
$mode = $data['mode'] // basic -- advance -- significance
$text = $data['text'];//ข้อความ
$check_box = $data['check_box']; // เช็ค box ที่เลือก รูปแบบ 0-0-0  --  0 = false, 1 = true
$pdf_path = $data['pdf_path'];
$img_path = $data['img_path'];
$year = $data['year'];//ปี
$query_mode = $data['query_mode']; // 0 == insert -- 1 == update
if($query_mode == 0){
    $db -> insert("category1-6_log",
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "mode" => $mode,
            "text" => $text,
            "check_box" => $check_box,
            "pdf_path" => $pdf_path,
            "img_path" => $img_path,
            "year" => $year,
        ]);
}else{  
    $id = $data['id'];
    $db -> update("category1-6_log",
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "mode" => $mode,
            "text" => $text,
            "check_box" => $check_box,
            "pdf_path" => $pdf_path,
            "img_path" => $img_path,
            "year" => $year,
        ],
        [
            "id" => $id
        ]);
}



?>