<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'];
$uid = $data['user_id'];
$category = $data['category']; //หมวดหมู่
$q_number = $data['q_number']; //ข้อ
$category_q_number = $data['category_q_number']; //ข้อย่อย;
$type = $data['type'];



        if($type == 'pdf'){
            $db -> update("category0_log",
                    [
                        "is_pdf" => $is_pdf
                    ],
                    [
                        "user_id" => $uid,
                        "q_number" => $q_number,
                        "category" => $category,
                        "category_q_number" => $category_q_number,
                        "year" => $year,
                    ]);
        }else{
            $db -> update("category0_log",
                    [
                        "is_img" => $is_img
                    ],
                    [
                        "user_id" => $uid,
                        "q_number" => $q_number,
                        "category" => $category,
                        "category_q_number" => $category_q_number,
                        "year" => $year,
                    ]);
        }
?>