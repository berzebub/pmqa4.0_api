<?php 
require("connection.php");

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];

   if(isset($_FILES['file'])){
        $file = $_FILES['file']['tmp_name'];
        $real_file_name =  $_FILES['file']['name'];
        $file_info = pathinfo($real_file_name,PATHINFO_EXTENSION);
        $new_file_name  = $uid. "-".  $year . "." . $file_info;
        move_uploaded_file($file, "upload6/" . $new_file_name);

$checkExists = $db -> select("upload_file_6month","*",
[
    "user_id" => $uid,
    "year" => $year
]);



if($checkExists){
    $db -> update("upload_file_6month",
    [
        "path" => "upload6/" .$new_file_name
    ],
    [
     "user_id" => $uid,
     "year" => $year   
    ]);

}else{
    $db -> insert("upload_file_6month",
    [
        "user_id" => $uid,
        "year" => $year,
        "path" => "upload6/" .$new_file_name
    ]);
}
echo "success";
    }
?>