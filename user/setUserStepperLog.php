<?php 
require("../connection.php");
$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];
$year = $data['year'];
$category = $data['category'];
$status = $data['status'];

$checkExists = $db -> select("user_stepper_log","*",
[
    "user_id" => $user_id,
    "year" => $year
]);

if(count($checkExists) > 0){
     $db -> update("user_stepper_log",
    [
        $category => $status
    ],
    [
        "user_id" => $user_id,
        "year" => $year
    ]);

}
else{
    $db -> insert("user_stepper_log",
    [
        "user_id" => $user_id,
        "year" => $year,
        "category0" => 0,
        "category1" => 0,
        "category2" => 0,
        "category3" => 0,
        "category4" => 0,
        "category5" => 0,
        "category6" => 0,
        "category7" => 0,
        "send_status" => 0
        
    ]);


    $checkExists = $db -> select("user_stepper_log","*",
        [
            "user_id" => $user_id,
            "year" => $year
        ]);
        if(count($checkExists) > 0){
            
            $db -> update("user_stepper_log",
            [
                $category => $status
            ],
            [
                "user_id" => $user_id,
                "year" => $year
            ]);

        }

    
}
?>