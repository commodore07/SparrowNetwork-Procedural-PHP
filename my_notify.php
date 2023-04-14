<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php
$get_nokio = $db->query("SELECT * FROM notifications WHERE username='$user' AND notifier != '$user' AND status='no'");
$liknokio = $get_nokio->num_rows;
if($liknokio == 0){
    $likevio = "";
}
else {
    $likevio = "<span class='messagesk'>$liknokio</span>";
}
 ?>

<?php echo "$likevio"; ?>