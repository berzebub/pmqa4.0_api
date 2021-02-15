<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];


$db -> delete("upload_file_6month_a",
[
    "user_id" => $user_id,
    "year" => $year,
]);


?>