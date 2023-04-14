<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $getid = strip_tags(@$_POST['cormade']);
 $getid = $db->real_escape_string($getid); 
 $getid = str_replace("'", "&apos;", $getid);
 
 ////// Fixid Begins
 $fixid = strip_tags(@$_POST['fixid']);
 $fixid = $db->real_escape_string($fixid); 
 $fixid = str_replace("'", "&apos;", $fixid);
 
 $get_fixi = $db->query("SELECT * FROM my_customers WHERE id='$fixid'");
$rollixee = $get_fixi->fetch_assoc();
$cuxphot = $rollixee['customer_photo'];
$smallphot = $rollixee['small_photo'];
 ////// Fixid Ends 
 
$get_voox = $db->query("SELECT * FROM tradefair WHERE id='$getid'");
$rollivo = $get_voox->fetch_assoc();
$iqty = $rollivo['item_qty'];
$usef = $rollivo['username'];
 
 $getqty = strip_tags(@$_POST['laquant']);
 $getqty = $db->real_escape_string($getqty); 
 $getqty = str_replace("'", "&apos;", $getqty);
 
 /// New Quantity
 $newqty = $iqty + $getqty;
 $ex_tim = date("h:i:sa");
 $sachdate = date('d/m/Y');
 
if ($user != "") {
if($cuxphot != ""){    
unlink($cuxphot);  
unlink($smallphot);
}
    //Submit the form to the database
    $info_submit_query = $db->query("UPDATE tradefair SET item_qty='$newqty' WHERE id='$getid'");
    $db->query("DELETE FROM my_customers WHERE id='$fixid'");
    $xenox = $db->query("INSERT INTO product_statuz VALUES ('','$usef','$getid','','$user','$ex_tim','$sachdate','$getqty','return','','')");
    $db->query("DELETE FROM view_cart WHERE real_id='$getid' AND cashier='$user'");
    echo "<meta http-equiv=\"refresh\" content=\"0; url=$user.trade\">";
	exit();

  }
?>