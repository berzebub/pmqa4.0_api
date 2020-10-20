<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$mode = $data['mode']; // 0 = insert // 1= update
$post_data = $data['postData'];
$year = $data['year'];
$uid = $data['user_id'];

for($i=0;$i<count($post_data);$i++){
    // if($mode == 0){
        // insert mode
        $checkExists = $db -> select("category0_log","*",
            [
                    "user_id" => $uid,
                    "q_number" => $post_data[$i]['q_number'],
                    "category" => $post_data[$i]['category'],
                    "category_q_number" => $post_data[$i]['category_q_number'],
                    "year" => $year,
            ]);


        if(count($checkExists) > 0){
            $db -> update("category0_log",
                [
                    "user_id" => $uid,
                    "q_number" => $post_data[$i]['q_number'],
                    "category" => $post_data[$i]['category'],
                    "category_q_number" => $post_data[$i]['category_q_number'],
                    "text" => $post_data[$i]['text'],
                    "year" => $year,
                ],
                [
                    "user_id" => $uid,
                    "q_number" => $post_data[$i]['q_number'],
                    "category" => $post_data[$i]['category'],
                    "category_q_number" => $post_data[$i]['category_q_number'],
                    "year" => $year,
                ]);

        }else{
            $db -> insert("category0_log",
                [
                    "user_id" => $uid,
                    "q_number" => $post_data[$i]['q_number'],
                    "category" => $post_data[$i]['category'],
                    "category_q_number" => $post_data[$i]['category_q_number'],
                    "text" => $post_data[$i]['text'],
                    "year" => $year,
                ]);
        }
  
}

?>