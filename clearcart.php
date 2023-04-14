<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php include("ago.php"); ?> 
<?php 
$post = strip_tags($_POST['uzee']);
$post = $db->real_escape_string($post); 
$post = str_replace("'", "&apos;", $post);
$tino = time();
if ($post != "") {
/////////// Search Query Begins
$info_submit_query = $db->query("DELETE FROM view_cart WHERE cashier='$user'"); 
?>
                <center><i style="font-size: 150px; color: #999;" class="fa fa-shopping-cart"></i></center>  
                <center><div style="font-size: 14px; color: #999;">Cart is empty...</div></center>
<?php
}
?>
