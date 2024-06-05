<?php
define('DB_SERVER','localhost');
define('DB_USER','root');

$con = mysqli_connect(DB_SERVER,DB_USER);
$con -> set_charset("utf8");
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>