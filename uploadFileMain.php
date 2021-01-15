<?php 
require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$type = $data['type'];

   if(isset($_FILES['file'])){
        $file = $_FILES['file']['tmp_name'];
        $real_file_name =  $_FILES['file']['name'];
        $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
        $new_file_name  = $uid . "-". $type . "-".  $year . "." . $file_info;
        move_uploaded_file($file, "uploadMain/" . $new_file_name);

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
        $file => 1,
        $path => "uploadMain/" .$new_file_name
    ],
    [
     "user_id" => $uid,
     "year" => $year   
    ]);

}else{
    $db -> insert("upload_file_main",
    [
        $file => 1,
        "user_id" => $uid,
        "year" => $year,
        $path => "uploadMain/" .$new_file_name
    ]);
}

    }
?>