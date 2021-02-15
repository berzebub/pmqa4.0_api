<?php 
require("connection.php");
$data = $_POST;
$year = $data['year'];
$uid = $data['user_id'];
$getFile = $db -> select("upload_file_6month","*",
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