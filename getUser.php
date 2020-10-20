<?php
require("connection.php");
$user_list = $db -> select("user_accounts","*");


if(count($user_list)){
    for($i=0;$i<count($user_list);$i++){
    $result[$i]['id'] = $user_list[$i]['id'];
    $result[$i]['office'] = $user_list[$i]['office'];
    $result[$i]['username'] = $user_list[$i]['username'];
    $result[$i]['password'] = $user_list[$i]['password'];
    $result[$i]['collaborator'] = $user_list[$i]['collaborator'];
    $result[$i]['tel'] = $user_list[$i]['tel'];
}

echo json_encode($result);
}else{
    echo "0";
}


?>