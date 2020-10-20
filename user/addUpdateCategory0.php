<?php 
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id']; //
$q_number = $data['q_number']; //ข้อที่
$category = $data['category']; //หมวดหมู่ เช่น ก ข ค ง
$category_q_number = $data['category_q_number'];//ข้อในหมวด
$text = $data['text'];//ข้อความ
$year = $data['year'];//ปี
$mode = $data['mode'] // 0 = insert // 1= update

if($mode == 0){
    $db -> insert("category0_log",
        [
            "user_id" => $user_id,
            "q_number" => $q_number,
            "category" => $category,
            "category_q_number" => $category_q_number,
            "text" => $text,
            "year" => $year,
        ]);
}else{
    $id = $data['id']
        $db -> update("category0_log",
            [
                "user_id" => $user_id,
                "q_number" => $q_number,
                "category" => $category,
                "category_q_number" => $category_q_number,
                "text" => $text,
                "year" => $year,
            ],
            [
                "id" => $id
            ]);
}



?>