<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///// Get item details
$quanx = strip_tags($_POST['quanx']);
$quanx = $db->real_escape_string($quanx); 
$quanx = str_replace("'", "&apos;", $quanx);
$costkior = strip_tags($_POST['costkior']);
$costkior = $db->real_escape_string($costkior); 
$costkior = str_replace("'", "&apos;", $costkior);

$tradcat = strip_tags($_POST['tradcat']);
$tradcat = $db->real_escape_string($tradcat); 
$tradcat = str_replace("'", "&apos;", $tradcat);
$tradcon = strip_tags($_POST['tradcon']);
$tradcon = $db->real_escape_string($tradcon); 
$tradcon = str_replace("'", "&apos;", $tradcon);
$tradnam = strip_tags($_POST['tradnam']);
$tradnam = $db->real_escape_string($tradnam); 
$tradnam = str_replace("'", "&apos;", $tradnam);
$tradtag = strip_tags($_POST['tradtag']);
$tradtag = $db->real_escape_string($tradtag); 
$tradtag = str_replace("'", "&apos;", $tradtag);
$tradex = strip_tags($_POST['tradex']);
$tradex = $db->real_escape_string($tradex); 
$tradex = str_replace("'", "&apos;", $tradex);
///////////// IS USER LOGGED IN?
if($user != ""){
if($tradcat != "" && $tradcon != "" && $tradnam != "" && $tradtag != "" && $tradex != "" && $quanx != "" && $costkior != ""){    
/////////////
$width = strip_tags($_POST['width']);
$width = $db->real_escape_string($width); 
//// height
$height = strip_tags($_POST['height']);
$height = $db->real_escape_string($height); 
//// end
//// x-axis
$xaxis = strip_tags($_POST['xaxis']);
$xaxis = $db->real_escape_string($xaxis); 
//// end
//// y-axis
$yaxis = strip_tags($_POST['yaxis']);
$yaxis = $db->real_escape_string($yaxis); 
//// end
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
    echo "ERROR: Please browse for a file before clicking the upload button.";
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
$moveResult = move_uploaded_file($fileTmpLoc, "user/$user/tradefair/$fileName");
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
$target_file = "user/$user/tradefair/$fileName";
$thumbnail = "user/$user/tradefair/thumb_$fileName";
$wthumb = "$width";
$hthumb = "$height";
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt, $yaxis, $xaxis);
// ------- End Adams Universal Image Thumbnail(Crop) Function -------

// ---------- Include Adams Universal Image Resizing Function --------
$target_fileo = "user/$user/tradefair/thumb_$fileName";
$resized_file = "user/$user/tradefair/pic_$fileName";
$wmax = 172.75;
$hmax = 129.5;
ak_img_resize($target_fileo, $resized_file, $wmax, $hmax, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------


// ---------- Include Adams Universal Image Resizing Function --------
$target_fileoac = "user/$user/tradefair/thumb_$fileName";
$resized_fit = "user/$user/tradefair/fit_$fileName";
$wfit = 691;
$hfit = 518;
resize_fit($target_fileoac, $resized_fit, $wfit, $hfit, $fileExt);
// ----------- End Adams Universal Image Resizing Function ----------

////////////// REMOVE UNNECCESSARY PICS
unlink($target_file);
unlink($thumbnail);
//////////////////////////////////////

///////////////////////////////
$datenow = date("l, d F Y"); 
$timm = time();
$artuxov = substr($tradex, 0, 10);        
$postatrav = "$datenow.$artuxov.$timm";   
/////////////////////
$sqlCommanda = "INSERT INTO tradefair VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,'','','')";  
$querya = $db->prepare($sqlCommanda) or die ($db->error());  
$querya->bind_param("ssssssssssss", $user, $tradcat, $timm, $postatrav, $tradcon, $tradnam, $tradtag, $tradex, $resized_file, $quanx, $resized_fit, $costkior);
$querya->execute();
//////////////////

///////////// Notify followers
$sqlCommxo = "INSERT INTO posts VALUES('',?,?,?,?,?,'','','tradefairpic','',?,'','','','',?,'','','','','','','')";  
$querox = $db->prepare($sqlCommxo) or die ($db->error()); 
$querox->bind_param("sssssss", $tradex, $timm, $user, $user, $resized_fit, $datenow, $postatrav);
$querox->execute();
////////////

// Display things to the page so you can see what is happening for testing purposes
echo "Item successfully added";

}
else {
    echo "Select a photo";
}

//////////////////////////////////
}
else {
    echo "Fill in all fields...";
}
}
?>