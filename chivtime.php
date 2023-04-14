<?php include("php/connectit.php"); ?>
<?php include("ago.php"); ?> 
<?php include("user_script.php"); ?> 

<?php
 $comid = strip_tags($_POST['chiv']);
 $comid = $db->real_escape_string($comid); 
 $comid = str_replace("'","&apos;", $comid);
 if ($comid !=""){
$get_noq = $db->query("SELECT * FROM post_comments WHERE post_id='$comid' ORDER BY id DESC LIMIT 1");
$rolva = $get_noq->fetch_assoc();
$timenoq = $rolva['time'];  
echo "$timenoq";
}
?>



