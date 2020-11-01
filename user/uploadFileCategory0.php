<?php 
require("../connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$category = $data['category']; //หมวดหมู่
$q_number = $data['q_number']; //ข้อ
$category_q_number = $data['category_q_number']; //ข้อย่อย;
$type = $data['type'];
$is_img = 0;
$is_pdf = 0;

    if($category == "ก."){
        $category_file = "a";
    }else if($category == "ข."){
        $category_file = "b";
    }else{
        $category_file = "c";
    }
    if(isset($_FILES['file'])){
        $img_file = $_FILES['file']['tmp_name'];
        $real_img_name = $_FILES['file']['name'];
        $img_file_info = pathinfo($real_img_name,PATHINFO_EXTENSION);
        $new_img_file_name = $uid."-".$q_number."-".$category_file."-".$category_q_number."-".$year.'.' . $img_file_info;
        move_uploaded_file($img_file, "../uploadcategory0/" . $new_img_file_name);
        if($type == 'pdf'){
            $is_pdf = 1;
        }else{
            $is_img = 1;
        }   
        $checkExists = $db -> select("category0_log","*",
                [
                    "user_id" => $uid,
                    "q_number" => $q_number,
                    "category" => $category,
                    "category_q_number" => $category_q_number,
                    "year" => $year,
                ]);

            if(count($checkExists) > 0){
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
              
               
            }else{
                 $db -> insert("category0_log",
                [
                    "user_id" => $uid,
                    "q_number" => $q_number,
                    "category" => $category,
                    "category_q_number" => $category_q_number,
                    "text" => "",
                    "year" => $year,
                     "is_img" => $is_img,
                    "is_pdf" => $is_pdf
                ]);
            }
    }
?>