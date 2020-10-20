<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$db -> update("assessor_accounts",[
    "status" => 1
],
[
    "id" => $id
]);
?>