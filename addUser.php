<?php 
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$office = $data['office'];
$username = $data['username'];
$password = $data['password'];
$collaborator = $data['collaborator'];
$tel = $data['tel'];

$db -> insert("user_accounts",
[
    "username" => $username,
    "password" => $password,
    "office" => $office,
    "collaborator" => $collaborator,
    "tel" => $tel
]);
?>