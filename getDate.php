<?php
require("connection.php");
$result[0]['date'] = date("d");
$result[0]['month'] = date("m");
$result[0]['year'] = date("Y") + 543;

echo json_encode($result);

?>
