<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);

$db -> update("assessment_status",
[
    "year" => $data['year'],
    "end_date" => $data['end_date'],
    "status" => $data['status']
]);
?>