<?php 
require("connection.php");

$data = $db -> select("assessment_status","*");

echo json_encode($data[0]);

?>