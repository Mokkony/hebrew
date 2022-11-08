<?php

session_start();

$host = "hebrew";         /* Host name */
$user = "global";           /* User */
$password = "mokony101";       /* Password */
$dbname = "israel";       /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
