<?php
require("connection.php");
$data = $db -> select("test","*");


for($i=0;$i<count($data);$i++){
    echo $data[$i]['test'];
}
?>