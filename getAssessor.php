<?php
require("connection.php");
$assessor_list = $db -> select("assessor_accounts","*",
[
    "status" => 0
]);

if(count($assessor_list)){

for($i=0;$i<count($assessor_list);$i++){
    $result[$i]['id'] = $assessor_list[$i]['id'];
    $result[$i]['name'] = $assessor_list[$i]['name'];
    $result[$i]['username'] = $assessor_list[$i]['username'];
    $result[$i]['password'] = $assessor_list[$i]['password'];
    $result[$i]['tel'] = $assessor_list[$i]['tel'];
}

echo json_encode($result);
}else{
    echo "0";
}


?>