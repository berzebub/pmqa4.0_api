<?php 
require("../connection.php");

//***** เหลือส่วน upload files -- move files */
$data = $_POST;

$user_id = $data['user_id']; //
$step = $data['step'];
$q_number = $data['q_number']; //ข้อที่
$mode = $data['mode']; // basic -- advance -- significance
$text = $data['text'];//ข้อความ
$check_box = $data['check_box']; // เช็ค box ที่เลือก รูปแบบ 0-0-0  --  0 = false, 1 = true
$year = $data['year'];//ปี
$is_img = 0; //สถานะว่ามีรูปภาพหรือไม่
$is_pdf = 0; //สถานีว่ามี pdf หรือไม่
$score = $data['score'];





    if(isset($_FILES['pdf'])){
        $pdf_file = $_FILES['pdf']['tmp_name'];
        $new_pdf_file_name = $user_id."-".$step."-".$q_number."-".$mode."-".$year.".pdf";
        move_uploaded_file($pdf_file, "../upload/" . $new_pdf_file_name);
        $is_pdf = 1;
    }



    if($data['pdf'] != 'null'){
        $is_pdf = 1;
    }

    $checkExists = $db -> select("category1_6_log","*",
        [
            "user_id" => $user_id,
            "year" => $year,
            "q_number" => $q_number,
            "mode" => $mode,
            "step" => $step,
        ]);

    if(count($checkExists) > 0){
        $db -> update("category1_6_log",
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "mode" => $mode,
            "text" => $text,
            "check_box" => $check_box,
            "is_pdf" => $is_pdf,
            "is_img" => $is_img,
            "year" => $year,
            "score" => $score
        ],
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "mode" => $mode,
            "year" => $year
        ]);

        $db -> update("category1_6_log",
        [
            "score" => $score
        ],
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "year" => $year
        ]);


    }else{
         $db -> insert("category1_6_log",
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "mode" => $mode,
            "text" => $text,
            "check_box" => $check_box,
            "is_pdf" => $is_pdf,
            "is_img" => $is_img,
            "year" => $year,
            "score" => $score
        ]);

        $db -> update("category1_6_log",
        [
            "score" => $score
        ],
        [
            "user_id" => $user_id,
            "step" => $step,
            "q_number" => $q_number,
            "year" => $year
        ]);
    }

?>