<?php
$db = new mysqli('127.0.0.1', 'root', '', 'sparnetwork');

if($db->connect_errno){
    die('Sorry... connection is void!');
}
?>