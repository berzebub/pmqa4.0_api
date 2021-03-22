<?php 
// ini_set('display_startup_errors', 1);
// ini_set('display_errors', 1);
// error_reporting(-1);

require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$plan = $data['plan'];

   if(isset($_FILES['file'])){
        $file = $_FILES['file']['tmp_name'];
        $real_file_name =  $_FILES['file']['name'];
        $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
        $new_file_name  = $uid . "-". $plan . "-".  $year . "." . $file_info;

        echo $new_file_name;
        move_uploaded_file($file, "upload_file_12_a_sum/" . $new_file_name);

        $checkExists = $db -> select("upload_file_12_a_sum","*",
        [
            "user_id" => $uid,
            "year" => $year,
            "plan" => $plan
        ]);



        if($checkExists){
            $db -> update("upload_file_12_a_sum",
            [
                "path" => "upload_file_12_a_sum/" .$new_file_name
            ],
            [
            "user_id" => $uid,
            "year" => $year   
            ]);

        }else{
            $db -> insert("upload_file_12_a_sum",
            [
                "user_id" => $uid,
                "path" => "upload_file_12_a_sum/" .$new_file_name,
                "plan" => $plan,
                "year" => $year,
            ]);
        }

    }
?>