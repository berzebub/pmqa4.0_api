<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['user_id'];
$year = $data['year'];


$db -> delete("category1_6_log",
[
    "user_id" => $user_id,
    "year" => $year
]);
$db -> delete("category0_log",
[
    "user_id" => $user_id,
    "year" => $year
]);

$db -> delete('category7_log',
[
    "user_id" => $user_id,
    "year" => $year + 543
]);

?>