<?php
require("connection.php");
$data = $_POST;
$user_id = $data['user_id']; //
$q_number = $data['q_number']; //ข้อใหญ่
$q_number_sub = $data['q_number_sub'];
$category = $data['category']; //หมวด ก ข ค
$year = $data['year'];

if(isset($_FILES['pdf'])){
    $pdf_file = $_FILES['pdf']['tmp_name'];
    $real_img_name = $_FILES['pdf']['name'];
    $new_img_file_name = $user_id."-".$q_number."-".$category."-".$q_number_sub .'-'.$year.".pdf";
    move_uploaded_file($pdf_file, "uploadTemp/" . $new_img_file_name);
    echo "finish upload";
}

if(isset($_FILES['img'])){
    $img_file = $_FILES['img']['tmp_name'];
    $real_img_name = $_FILES['img']['name'];
    $new_img_file_name = $user_id."-".$q_number."-".$category."-".$q_number_sub .'-'.$year.".jpg";
    move_uploaded_file($img_file, "uploadTemp/" . $new_img_file_name);
    echo "finish upload";
}



 ?>