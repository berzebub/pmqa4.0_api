<?php 
require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$type = $data['type'];
  
$checkExists = $db -> select("upload_file_6month","*",
[
    "user_id" => $uid,
    "year" => $year
]);


if($checkExists){
    $db -> update("upload_file_6month",
    [
        $path => "",
    ],
    [
     "user_id" => $uid,
     "year" => $year   
    ]);

}

    
?>