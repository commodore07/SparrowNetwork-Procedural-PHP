<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
$username = $_GET['U'];
$username = $db->real_escape_string($username); 

?>

<?php 
$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
$datenow = date('d/m/Y');
$timm = time();

$getlasx = $db->query("SELECT * FROM viewz_trade WHERE log_ip='$ip' AND username='$username' AND log_date='$datenow'") or die($db->error());
$infolasx = $getlasx->num_rows;
if($infolasx == 0){
$sqlCommav = "INSERT INTO viewz_trade VALUES('','$username','$ip','$datenow','$timm')";  
$queryav = $db->query($sqlCommav) or die ($db->error()); 
} else {
    ////// DO NOTHING
}
?>
