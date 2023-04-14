<?php include("php/connectit.php"); ?>
<?php include("ago.php"); ?> 
<?php include("user_script.php"); ?>

<?php
$comid = strip_tags($_POST['chiv']);
$comid = $db->real_escape_string($comid); 
$comid = str_replace("'","&apos;", $comid);

 $receiver = "$comid";
 if ($comid !=""){
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$timolee = $rollin['time']; 
echo $timolee;
}
?>



