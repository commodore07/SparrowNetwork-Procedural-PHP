<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>

<?php 
$resized_file = "";

?>

<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
//// Upload images 
if(empty($_FILES["confpop"]["name"])){
    echo "Select photo!";
    echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
}  else    
if (isset($_FILES['confpop'])) {

$file_name = $_FILES["confpop"]["name"]; // The file name
$file_tmp = $_FILES["confpop"]["tmp_name"]; // File in the PHP tmp folder
$type = $_FILES["confpop"]["type"]; // The type of file it is
$file_size = $_FILES["confpop"]["size"]; // File size in bytes
$file_error = $_FILES["confpop"]["error"]; // 0 for false... and 1 for true

$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));


$file_name_new = uniqid('', true) . '.' . $file_ext;



if(move_uploaded_file($file_tmp, "user/$user/posts/$file_name_new")){


$allowed = array('jpg', 'jpeg', 'gif', 'png');

if (in_array($file_ext, $allowed)){

if ($file_error === 0){

if ($file_size <= 4194304){
    
////////////RESIZE STATUS IMAGE
include_once("crop_resize.php");

// ---------- Include Adams Universal Image Resizing Function --------
$target = "user/$user/posts/$file_name_new";
////Get Image Size
$dataxa = getimagesize($target);
$widax = $dataxa[0];
$heigax = $dataxa[1];
////
$resized_file = "user/$user/posts/resized_$file_name_new";
////// Condition
if($file_size < 1048576){
$wmax = $widax;
$hmax = $heigax;    
}
////////
else {
$wmax = $widax / 4;
$hmax = $heigax / 4;
}
////////
ak_img_resize($target, $resized_file, $wmax, $hmax, $file_ext);
// ----------- End Adams Universal Image Resizing Function ----------
/////////// END RESIZE

unlink($target);

////// Insert Query 

///// End Query

    	
} 

else {

echo "large image size"; 

}
}

else {

}
}

else {

echo "format not supported";

}
}
////// Insert Query Option 1
$popid = strip_tags($_POST['popid']);
$popid = str_replace("'", "&apos;", $popid);
//////
$get_popid = $db->query("SELECT * FROM match_ph WHERE id='$popid'");
$reabizz = $get_popid->num_rows;
$rollin = $get_popid->fetch_assoc();
$repid = $rollin['receiver'];
$amtpid = $rollin['amt_matched'];

$timp = time();
$tmacch = $timp + 172800;

if($reabizz != 0){
$poqpay = $db->query("UPDATE match_ph SET pop_status='on', time_elapse='$tmacch' WHERE id='$popid'");
$proovepay = $db->query("UPDATE ponzee SET prove_pay='on' WHERE username='$user'");
}
$xenoxap = $db->query("INSERT INTO pay_proof VALUES ('','$user','$repid','$resized_file','$timp','$amtpid','$popid','','','')");
echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
////// End Query
}  
}
?>

