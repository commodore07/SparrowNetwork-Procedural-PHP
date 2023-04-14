<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$xollo = strip_tags(@$_POST['xollo']);
$xollo = $db->real_escape_string($xollo); 
 $xollo = str_replace("'", "&apos;", $xollo);
 
$qollo = strip_tags(@$_POST['qollo']);
$qollo = $db->real_escape_string($qollo); 
 $qollo = str_replace("'", "&apos;", $qollo); 

if ($user != "") {
///// GO GET THE QUANTITY REMAINING
$get_qiax = $db->query("SELECT * FROM tradefair WHERE id='$xollo'");
$roiax = $get_qiax->fetch_assoc();
$itemqty = $roiax['item_qty'];
if($itemqty >= $qollo){
    echo "Transaction was successful...";
} else {
    echo "Sorry you have $itemqty in store!";
}
//// END GO GET THE QUANTITY REMAINING
}
?>



