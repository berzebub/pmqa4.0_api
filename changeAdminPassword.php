<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$new_password = $data['newPassword'];
$old_password = $data['oldPassword']; // พาสเก่าที่กรอกเข้ามา
$repeat_new_password = $data['repeatNewPassword'];





// // Check old password
$check_password = $db -> select("admin_accounts","*",
[
    "id" => $id
]);

$get_old_password = $check_password[0]['password'];



if(($get_old_password == $old_password) && ($new_password == $repeat_new_password) && (strlen($new_password) >= 4)){
    $db -> update("admin_accounts",
    [
        "password" => $new_password
    ],
    [
        "id" => $id
    ]);
    echo 'success';
}else{

    if(strlen($new_password) < 4){
        echo "error password length";
    }else{
        if($get_old_password != $old_password){
        // กรณีพาสเก่าไม่ถูกต้อง
             echo "error old password";
        }else if ($new_password != $repeat_new_password){
            // กรณีพาสเวิดสองช่องไม่เหมือนกัน
            echo "error repeat password";
        }
    }
    
    
}

?>