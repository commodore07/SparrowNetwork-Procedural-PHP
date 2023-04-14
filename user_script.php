<?php 
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}

$user = $db->real_escape_string($user); 
$user = str_replace("'","&apos;", $user);
?>