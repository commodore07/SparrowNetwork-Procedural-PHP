<?php include("php/connectit.php"); ?>
<?php include("ago.php"); ?> 
<?php include("user_script.php"); ?> 
<?php 
if($user == ""){
    $user = "anonymous";
}
else {
    $user = "$user";
}
?>
<?php
 $comid = strip_tags($_POST['comid']);
 $comid = $db->real_escape_string($comid); 
 $comid = str_replace("'","&apos;", $comid);
 if ($comid !=""){
     
$gettoo = "(SELECT * FROM post_comments WHERE post_id='$comid' ORDER BY id DESC LIMIT 10) ORDER BY id ASC";
$get_comments = $db->query($gettoo);
$count = $get_comments->num_rows;
include("while_cheezi.php");                               
}
?>



