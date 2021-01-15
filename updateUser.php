<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
// $id = $_GET['id'];
$id = $data['id'];
$username = $data['username'];
$password = $data['password'];
$collaborator = $data['collaborator'];
$assessor_id = $data['assessor'];
$tel = $data['tel'];
$db -> update("user_accounts",
[
    "username" => $username,
    "password" => $password,
    "collaborator" => $collaborator,
    "tel" => $tel,
    "assessor_id" => $assessor_id
],
[
    "id" => $id
]);


?>