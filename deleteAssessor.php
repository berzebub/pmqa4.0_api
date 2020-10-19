<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$db -> delete("assessor_accounts",
[
    "id" => $id
]);
?>