<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];
$data = $db -> select("category1_6_log","*",
[
    "user_id" => $user_id,
    "year" => $year
]);


echo json_encode($data);
?>