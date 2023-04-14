<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
/////////////
$width = strip_tags($_POST['dataWiz']);
$width = $db->real_escape_string($width); 
$width = str_replace("'", "&apos;", $width);
//// height
$height = strip_tags($_POST['dataHeiz']);
$height = $db->real_escape_string($height); 
$height = str_replace("'", "&apos;", $height);
//// end
//// x-axis
$xaxis = strip_tags($_POST['datzX']);
$xaxis = $db->real_escape_string($xaxis);
$xaxis = str_replace("'", "&apos;", $xaxis);
//// end
//// y-axis
$yaxis = strip_tags($_POST['datzY']);
$yaxis = $db->real_escape_string($yaxis); 
$yaxis = str_replace("'", "&apos;", $yaxis);
//// end
if (isset($_FILES['Inputval'])) {
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$fileName = $_FILES["Inputval"]["name"]; // The file name
$fileTmpLoc = $_FILES["Inputval"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["Inputval"]["type"]; // The type of file it is
$fileSize = $_FILES["Inputval"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["Inputval"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
} else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
// END PHP Image Upload Error Handling ---------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$fileName = uniqid('', true) . '.' . $fileName;
$moveResult = move_uploaded_file($fileTmpLoc, "user/$user/profile_pics/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
}

// ---------- Include Adams Universal Image Resizing Function --------
include_once("crop_resize.php");

// ----------- End Adams Universal Image Resizing Function ----------
// ------ Start Adams Universal Image Thumbnail(Crop) Function ------
$target_file = "user/$user/profile_pics/$fileName";
$thumbnail = "user/$user/profile_pics/thumb_$fileName";
$wthumb = "$width";
$hthumb = "$height";
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt, $yaxis, $xaxis);
// ------- End Adams Universal Image Thumbnail(Crop) Function -------

// ---------- Include Adams Universal Image Resizing Function --------
$target_fileo = "user/$user/profile_pics/thumb_$fileName";
$resized_file = "user/$user/profile_pics/pic_$fileName";
$wmax = 343;
$hmax = 177;
ak_img_resize($target_fileo, $resized_file, $wmax, $hmax, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------


// ---------- Include Adams Universal Image Resizing Function --------
$target_fileoac = "user/$user/profile_pics/thumb_$fileName";
$resized_fit = "user/$user/profile_pics/fit_$fileName";
$wfit = 1030;
$hfit = 530;
resize_fit($target_fileoac, $resized_fit, $wfit, $hfit, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------

////////////// REMOVE UNNECCESSARY PICS
unlink($target_file);
unlink($thumbnail);
//////////////////////////////////////

///////////////////////////////
$datenow = date("l, d F Y"); 
$timm = time();
/////////////////////
$sqlCommanda = "INSERT INTO pro_background VALUES('', '$user','$resized_fit','$resized_file','$datenow','$timm','')";  
$querya = $db->query($sqlCommanda) or die ($db->error());  
//////////////////

///////////// Notify followers
$sqlCommxo = "INSERT INTO posts VALUES('','','$timm','$user','$user','$resized_fit','','','backgroundpic','','$datenow','','','','','','','','','','','','')";  
$querox = $db->query($sqlCommxo) or die ($db->error()); 
////////////

$picx = $db->query("UPDATE users SET backgroundcrop_pic='$resized_file', background_pic='$resized_fit' WHERE username='$user'");
// Display things to the page so you can see what is happening for testing purposes

echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
}
else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
exit();
}

//////////////////////////////////
}
?>