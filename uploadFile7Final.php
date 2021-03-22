<?php 
require("connection.php");

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$type = $data['type'];


print_r($data);

   if(isset($_FILES['file'])){
        $file = $_FILES['file']['tmp_name'];
        $real_file_name =  $_FILES['file']['name'];
        $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
        $new_file_name  = $uid . "-". $type . "-".  $year . "." . $file_info;
        move_uploaded_file($file, "uploadCat7Final/" . $new_file_name);

$checkExists = $db -> select("upload_file7_final","*",
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
    echo "update";
    $db -> update("upload_file7_final",
    [
        $file => 1,
        $path => "uploadCat7Final/" .$new_file_name
    ],
    [
     "user_id" => $uid,
     "year" => $year   
    ]);

}else{
    echo "no update";
    $db -> insert("upload_file7_final",
    [
        $file => 1,
        "user_id" => $uid,
        "year" => $year,
        $path => "uploadCat7Final/" .$new_file_name
    ]);
}
echo "success";
    }
?>