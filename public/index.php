<?php
require_once('../includes/database.php');


//echo 'this is working<br>';
//echo $database->escape_value("It's working?<br>");

$sql =  "INSERT INTO users(id, username, password, first_name, last_name) ";
$sql .= "VALUES(1, 'kskoglund', 'secretpwd', 'kevin', 'skoglund')";
//$result = $database->query($sql);
//

$sql = "select * from users where id=1";
$user = $database->fetch_array($database->query($sql));
echo $user['username'];

?>
