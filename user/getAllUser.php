<?php
require("../connection.php");
$data = $db -> select("user_accounts","*");

echo json_encode($data);
?>