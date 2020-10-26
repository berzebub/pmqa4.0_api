<?php
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['id'];
$user_data = $db -> select("user_accounts",[
    "username",
    "office",
    "collaborator",
    "tel"
],
[
    "id" => $user_id
]);

echo json_encode($user_data[0]);
?>