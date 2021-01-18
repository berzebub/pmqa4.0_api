<?php 
require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$type = $data['type'];
  
$checkExists = $db -> select("upload_file_main","*",
[
    "user_id" => $uid,
    "year" => $year
]);

if($type == 1){
    $file = "file1";
    $path = "path1";


   
}else{
    $file = "file2";
    $path = "path2";
    
}

if($checkExists){
    $db -> update("upload_file_main",
    [
        $file => 0,
        $path => "",
    ],
    [
     "user_id" => $uid,
     "year" => $year   
    ]);

}

    
?>