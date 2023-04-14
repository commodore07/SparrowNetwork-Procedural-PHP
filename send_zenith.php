<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>

<?php 
$resized_file = "";
///// Lastpost check
$getinfiix = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfiix->fetch_assoc();
$lastpost = $roz['online'];
$adpost = $roz['adsenze'];
///// End lastpost check
?>

<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
//// Upload images 
if(empty($_FILES["zenscan"]["name"])){
    echo "Select Zenith QR Code!";
}  else    
if (isset($_FILES['zenscan'])) {

$file_name = $_FILES["zenscan"]["name"]; // The file name
$file_tmp = $_FILES["zenscan"]["tmp_name"]; // File in the PHP tmp folder
$type = $_FILES["zenscan"]["type"]; // The type of file it is
$file_size = $_FILES["zenscan"]["size"]; // File size in bytes
$file_error = $_FILES["zenscan"]["error"]; // 0 for false... and 1 for true

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
$infa = $db->query("UPDATE users SET scantopay='$resized_file' WHERE username='$user'");
echo "Success";
////// End Query
}  
}
?>

