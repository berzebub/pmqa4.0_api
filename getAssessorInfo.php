<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);

$user_id = $data['user_id'];
$dataAssessor = $db -> select("assessor_accounts","*",
[
    "id" => $user_id
]);

echo json_encode($dataAssessor);
?>