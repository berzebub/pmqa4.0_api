<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$status = $data['status'];
$db -> update("assessor_accounts",[
    "status" => $status
],
[
    "id" => $id
]);
?>