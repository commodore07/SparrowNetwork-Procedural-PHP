<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>


<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
$par = "";
$post = strip_tags($_POST['viddec']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);
$post = str_replace("\n", "<br>", $post);

//////// Youtube URL
$vidurl = strip_tags($_POST['vidurl']);
$vidurl = $db->real_escape_string($vidurl); 
$vidurl = preg_replace("#.*youtube\.com/watch\?v=#","",$vidurl);
$vidurl = preg_replace("#.*youtu\.be/#","",$vidurl);
////
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";

if ($post != "") {
    
if (isset($_FILES['tubez'])) {
$file_name = $_FILES["tubez"]["name"]; // The file name
$file_tmp = $_FILES["tubez"]["tmp_name"]; // File in the PHP tmp folder
$type = $_FILES["tubez"]["type"]; // The type of file it is
$file_size = $_FILES["tubez"]["size"]; // File size in bytes
$file_error = $_FILES["tubez"]["error"]; // 0 for false... and 1 for true

$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));


$file_name_new = uniqid('', true) . '.' . $file_ext;

if (!$file_tmp) { // if file not chosen
    echo "Select a youtube preview photo...";
    exit();
}

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

/////// #tag begins        
	$htag = "#";
	$hrr= explode(" ",$post);
	$hrrc= count($hrr);
	$i = 0;
	while ($i < $hrrc)	{
	if (substr($hrr[$i], 0 , 1) === $htag) {
	$par = $hrr[$i];
	$par = str_replace("#", "", $par);
	}
	$i++;
	}		
	
/////// #tag ends

///// Grand Query
$get_vazz = $db->query("SELECT * FROM hash_tag WHERE hash_word='$par' AND date_created ='$date_added'");
$cvazz = $get_vazz->num_rows;
$rollin = $get_vazz->fetch_assoc();
$iddo = $rollin['hash_num'];
    
    if($iddo == ''){
        $iddo = 1;
    }
    else {
        $iddo = "$iddo";
    }
//// End Grand Query
    
//// Database insert query
////// Insert Query Option 1
    
//// Check for crimson stat
$getcrix = $db->query("SELECT * FROM users WHERE username='$user' AND blogxee='on'") or die($db->error());
$lacrix = $getcrix->num_rows;
if($lacrix > 0){
    $statcrix = "crimson";
}
else {
    $statcrix = "";
}
/// End check        
    
if ($cvazz == 0){
$sqlCommand = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','$statcrix','','$date_added','','','','','','','$vidurl','','','','','')";  
$query = $db->prepare($sqlCommand) or die ($db->error());
$query->bind_param("s", $post);
$query->execute();

if($par != ""){
$hash_cmd = "INSERT INTO hash_tag VALUES('', '$par','1','$timm','$date_added','','')";  
$hash_query = $db->query($hash_cmd) or die ($db->error());
}
}
////// End Query

////// Insert Query Option 2
else{

$incc = $iddo + 1;    
    
$sqlCommanda = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','$statcrix','','$date_added','','','','','','','$vidurl','','','','','')";  
$querya = $db->prepare($sqlCommanda) or die ($db->error()); 
$querya->bind_param("s", $post);
$querya->execute();

$infa = $db->query("UPDATE hash_tag SET hash_num='$incc' WHERE hash_word='$par' AND date_created ='$date_added'");

}
///// End Query
//// End database insert query    
echo "Youtube video chirp was successful...";
unlink($target); // Remove the uploaded file from the PHP temp folder   	
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

else {
    echo "move_uploaded_file function failed";
}
}
else {
    echo "Select a youtube preview photo...";
}

 }

 //////////////////////// END USER LOGIN
                 
}
?>

