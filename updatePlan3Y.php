<?php
require("connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$assessor_id = $data['assessor_id'];
$year = $data['year'];
$text = $data['text'];


$checkExists = $db -> select("plan_3y","*",
[
    "user_id" => $user_id,
    "year" => $year
]);

if(count($checkExists)){

    $db -> update("plan_3y",
    [   
        "suggestion" => $text,
        "assessor_id" => $assessor_id
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);

}else{
    $db -> insert("plan_3y",
    [
        "user_id" => $user_id,
        "suggestion" => $text,
        "assessor_id" => $assessor_id,
        "year" => $year
    ]);
}

echo "success";
?>