<?php 
require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$type = $data['type'];
$getFile = $db -> select("upload_file7_final","*",
[
    "user_id" => $uid,
    "year" => $year
]);

if($getFile){
    echo json_encode($getFile);
}else{
    echo "no files";
}
?>