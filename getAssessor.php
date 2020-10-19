<?php
require("connection.php");
$user_list = $db -> select("assessor_accounts","*");

for($i=0;$i<count($user_list);$i++){
    $result[$i]['id'] = $user_list[$i]['id'];
    $result[$i]['name'] = $user_list[$i]['name'];
    $result[$i]['username'] = $user_list[$i]['username'];
    $result[$i]['password'] = $user_list[$i]['password'];
    $result[$i]['tel'] = $user_list[$i]['tel'];
}

echo json_encode($result);

?>