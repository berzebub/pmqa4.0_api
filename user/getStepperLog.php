<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];

$checkExists = $db -> select("user_stepper_log","*",
[
    "user_id" => $user_id,
    "year" => $year
]);

echo json_encode($checkExists[0]);


?>