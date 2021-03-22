<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];
$plan = $data['plan'];


$db -> delete("upload_file_12_a",
[
    "user_id" => $user_id,
    "year" => $year,
    "plan" => $plan
]);


?>