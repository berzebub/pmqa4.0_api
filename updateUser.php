<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
// $id = $_GET['id'];
$id = $data['id'];
$username = $data['username'];
$password = $data['password'];
$collaborator = $data['collaborator'];
$tel = $data['tel'];
$db -> update("user_accounts",
[
    "username" => $username,
    "password" => $password,
    "collaborator" => $collaborator,
    "tel" => $tel
],
[
    "id" => $id
]);


?>