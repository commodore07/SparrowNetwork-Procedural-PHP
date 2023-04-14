<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


 <?php include("ago.php"); ?>


<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
$uzzaname = $_GET['UK'];  
$uzzaname = $db->real_escape_string($uzzaname); 

////////////////
$post = strip_tags($_POST['sazumsg']);
$post = $db->real_escape_string($post); 

$doqamt = strip_tags($_POST['servamt']);
$doqamt = $db->real_escape_string($doqamt); 

$sachdate = date('d/m/Y');
$datenow = date("l, d F Y"); 
$timm = time();
$ex_tim = date("h:i:sa");

if ($post != "" && $user != "") {

$sqlCommxo = "INSERT INTO my_customers VALUES('',?,'','',?,'1','',?,?,?,'','','','0',?,'','',?,'services',?)";  
$querox = $db->prepare($sqlCommxo) or die ($db->error()); 
$querox->bind_param("ssssssss", $uzzaname, $doqamt, $timm, $sachdate, $datenow, $post, $user, $ex_tim);
$querox->execute();

echo "Update was successful...";
} else {
    echo "Fill in all fields!";
}
}
?>

