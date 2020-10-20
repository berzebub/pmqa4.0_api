<?php 
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'];
$password = $data['password'];
$type = $data['type'];


if($type == 'ผู้ใช้แต่ละหน่วยงาน'){
    // user accounts
    $checkLogin = $db -> select("user_accounts","*",
    [
        "username" => $username,
        "password" => $password,
    ]);
   

}else if ($type == 'ผู้ประเมิน'){
    // assessor accounts
      $checkLogin = $db -> select("assessor_accounts","*",
    [
        "username" => $username,
        "password" => $password,
    ]);
   

}else{
    $checkLogin = $db -> select("admin_accounts","*",
    [
        "username" => $username,
        "password" => $password
    ]);

}
 if(count($checkLogin) > 0){
        echo 1;
    }else{
        echo 0;
    }
?>