<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$tandee = $_GET['TD'];
$tandee = $db->real_escape_string($tandee); 
$tandee = str_replace("'","&apos;", $tandee);

$uni = "";
$gra_totaa = 0;
$totalxz = 0; 

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$total_eev = $db->query("SELECT * FROM my_expenses WHERE username = '$user' AND tran_date='$tandee' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_exp.php");
?>



 