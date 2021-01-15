<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$category = $data['category'];
$a_score = $data['a_score'];

$db -> update("assessment_log",
[
    $category => $a_score
],
[
    "user_id" => $user_id,
    "year" => $year
]);


?>