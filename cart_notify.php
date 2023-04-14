<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>


<?php
$get_nokio = $db->query("SELECT * FROM view_cart WHERE cashier = '$user'");
$liknokio = $get_nokio->num_rows;
if($liknokio == 0){
    $likevio = "";
}
else {
    $likevio = "<span class='messagesk'>$liknokio</span>";
}
 ?>

<?php echo "$likevio"; ?>