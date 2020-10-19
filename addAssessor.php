<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
// $id = $_GET['id'];
$id = $data['id'];
$name = $data['name'];
$username = $data['username'];
$password = $data['password'];
$tel = $data['tel'];

// check Exists username

$is_username_exists = $db -> select("assessor_accounts","username",
[
    "username" => $username,
]);

if(count($is_username_exists)){
    // 0 = usename is already taken
    echo 0;

}else{
$db -> insert("assessor_accounts",
[
    "name" => $name,
    "username" => $username,
    "password" => $password,
    "tel" => $tel
]);
echo 1;
}



?>