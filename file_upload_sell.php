<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
$resized_fit = "";
$resized_file = "";
$ex_tim = date("h:i:sa");
///////////////////////////////
$datenow = date("l, d F Y"); 
$timm = time();
$sachdate = date('d/m/Y');

$qidx = strip_tags($_POST['cormade']);
$qidx = $db->real_escape_string($qidx); 
$qidx = str_replace("'", "&apos;", $qidx);
////// Query
$getqidx = $db->prepare("SELECT * FROM tradefair WHERE id=?" ) or die($db->error());
$getqidx->bind_param("s", $qidx);
$getqidx->execute();
$getqidx = $getqidx->get_result();
$rozidx = $getqidx->fetch_assoc();

$accpic = $rozidx['actual_pic'];
$costprice = $rozidx['cost_price'];
$uzzname = $rozidx['username'];
$laname = $rozidx['name'];
$lachasis = $rozidx['chasis'];
////// End Query

///////////// IS USER LOGGED IN?
if($user != ""){
/////////////
$sellid = strip_tags($_POST['sellid']);
$sellid = $db->real_escape_string($sellid); 

$sellqty = strip_tags($_POST['sellqty']);
$sellqty = $db->real_escape_string($sellqty); 

$selltag = strip_tags($_POST['selltag']);
$selltag = $db->real_escape_string($selltag); 

$cus_name = strip_tags($_POST['cus_name']);
$cus_name = $db->real_escape_string($cus_name); 

if($cus_name == ""){
    $cus_name = "anonymous";
} else {
    $cus_name = "$cus_name";
}

$cus_no = strip_tags($_POST['cus_no']);
$cus_no = $db->real_escape_string($cus_no); 
//// height    
    
/////////////
$width = strip_tags($_POST['dataWidth']);
$width = $db->real_escape_string($width); 
//// height
$height = strip_tags($_POST['dataHeight']);
$height = $db->real_escape_string($height); 
//// end
//// x-axis
$xaxis = strip_tags($_POST['dataX']);
$xaxis = $db->real_escape_string($xaxis); 
//// end
//// y-axis
$yaxis = strip_tags($_POST['dataY']);
$yaxis = $db->real_escape_string($yaxis); 
//// end
if($sellqty != "" && $selltag != "" && $cus_name != "" && $cus_no != ""){
    
///// GO GET THE QUANTITY REMAINING
$get_qiax = $db->prepare("SELECT * FROM tradefair WHERE id=?");
$get_qiax->bind_param("s", $qidx);
$get_qiax->execute();
$get_qiax = $get_qiax->get_result();

$roiax = $get_qiax->fetch_assoc();
$itemqty = $roiax['item_qty'];
//// END GO GET THE QUANTITY REMAINING
if($itemqty >= $sellqty){
$remieqty = $itemqty - $sellqty;    

if(empty($_FILES["avatarInput"]["name"])){
    //// Remove from store
$sqlremsto = "UPDATE tradefair SET item_qty=? WHERE id=? AND username=?";  
$queremsto = $db->prepare($sqlremsto) or die ($db->error()); 
$queremsto->bind_param("sss", $remieqty, $qidx, $uzzname);
$queremsto->execute();

$xenox = $db->prepare("INSERT INTO product_statuz VALUES ('',?,?,?,?,?,?,?,'remove','','')");
$xenox->bind_param("sssssss", $uzzname, $qidx, $cus_name, $user, $ex_tim, $sachdate, $sellqty);
$xenox->execute();

///////////// Notify followers
$sqlCommxo = "INSERT INTO my_customers VALUES('',?,?,?,?,?,?,?,?,?,'','',?,?,?,?,?,?,'goods',?)";  
$querox = $db->prepare($sqlCommxo) or die ($db->error()); 
$querox->bind_param("ssssssssssssssss", $uzzname, $cus_name, $cus_no, $selltag, $sellqty, $sellid, $timm, $sachdate, $datenow, $accpic, $costprice, $laname, $lachasis, $qidx, $user, $ex_tim);
$querox->execute();
////////////

$viewcartz = $db->prepare("INSERT INTO view_cart VALUES ('',?,?,?,?,?,?,?,?)");
$viewcartz->bind_param("ssssssss", $uzzname, $laname, $selltag, $sellqty, $timm, $accpic, $qidx, $user);
$viewcartz->execute();

echo "Transaction was successful";
} else   
if (isset($_FILES['avatarInput'])) {
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$fileName = $_FILES["avatarInput"]["name"]; // The file name
$fileTmpLoc = $_FILES["avatarInput"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["avatarInput"]["type"]; // The type of file it is
$fileSize = $_FILES["avatarInput"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["avatarInput"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "Select a photo!";

} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
  
}
// END PHP Image Upload Error Handling ---------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$fileName = uniqid('', true) . '.' . $fileName;
$moveResult = move_uploaded_file($fileTmpLoc, "user/$user/customers/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
   
}

// ---------- Include Adams Universal Image Resizing Function --------
include_once("crop_resize.php");

// ----------- End Adams Universal Image Resizing Function ----------
// ------ Start Adams Universal Image Thumbnail(Crop) Function ------
$target_file = "user/$user/customers/$fileName";
$thumbnail = "user/$user/customers/thumb_$fileName";
$wthumb = "$width";
$hthumb = "$height";
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt, $yaxis, $xaxis);
// ------- End Adams Universal Image Thumbnail(Crop) Function -------

// ---------- Include Adams Universal Image Resizing Function --------
$target_fileo = "user/$user/customers/thumb_$fileName";
$resized_file = "user/$user/customers/pic_$fileName";
$wmax = 100;
$hmax = 100;
ak_img_resize($target_fileo, $resized_file, $wmax, $hmax, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------


// ---------- Include Adams Universal Image Resizing Function --------
$target_fileoac = "user/$user/customers/thumb_$fileName";
$resized_fit = "user/$user/customers/fit_$fileName";
$wfit = 300;
$hfit = 300;
resize_fit($target_fileoac, $resized_fit, $wfit, $hfit, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------

////////////// REMOVE UNNECCESSARY PICS
unlink($target_file);
unlink($thumbnail);
//////////////////////////////////////

//// Remove from store
$sqlremsto = "UPDATE tradefair SET item_qty=? WHERE id=? AND username=?";  
$queremsto = $db->prepare($sqlremsto) or die ($db->error()); 
$queremsto->bind_param("sss", $remieqty, $qidx, $uzzname);
$queremsto->execute();

$xenox = $db->prepare("INSERT INTO product_statuz VALUES ('',?,?,?,?,?,?,?,'remove','','')");
$xenox->bind_param("sssssss", $uzzname, $qidx, $cus_name, $user, $ex_tim, $sachdate, $sellqty);
$xenox->execute();

///////////// Notify followers
$sqlCommxo = "INSERT INTO my_customers VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'goods',?)";  
$querox = $db->prepare($sqlCommxo) or die ($db->error()); 
$querox->bind_param("ssssssssssssssssss", $uzzname, $cus_name, $cus_no, $selltag, $sellqty, $sellid, $timm, $sachdate, $datenow, $resized_fit, $resized_file, $accpic, $costprice, $laname, $lachasis, $qidx, $user, $ex_tim);
$querox->execute();
////////////

$viewcartz = $db->query("INSERT INTO view_cart VALUES ('','$uzzname','$laname','$selltag','$sellqty','$timm','$accpic','$qidx','$user')");

echo "Transaction was successful";
} 

} else {
    echo "Sorry you have $itemqty in store!";
}

}
else {
    echo "Fill in all fields!";

}

//////////////////////////////////
}
?>