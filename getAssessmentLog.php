<?php 
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$year = $data['year'];
$assessment_data = $db -> select("assessment_log","*",
[
    "year" => $year,
]);

echo json_encode($assessment_data);
?>