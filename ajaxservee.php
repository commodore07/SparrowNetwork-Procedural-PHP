<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$tandee = $_GET['TD'];
$tandee = $db->real_escape_string($tandee); 
$tandee = str_replace("'","&apos;", $tandee);

$univer = "";
$gra_totaaver = 0;
$totalxzver = 0;   

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$totaleever = $db->query("SELECT * FROM my_customers WHERE seller = '$user' AND search_date='$tandee' AND le_status='services' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_servey.php");
?>



 