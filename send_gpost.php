<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>

<?php 
///// Lastpost check
$getinfiix = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfiix->fetch_assoc();
$lastpost = $roz['online'];
$lastcrim = $roz['crimson_last'];
$adpost = $roz['adsenze'];
///// End lastpost check
?>

<?php
$par = "none";
$resized_file = "";

///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
///// GET TITLE
$tiitoo = strip_tags($_POST['tiitoo']);
$tiitoo = $db->real_escape_string($tiitoo); 
$tiitoo = str_replace("\'", "&apos;", $tiitoo);
$timoci = time();

///// SLUG FUNCTION
function php_slug($string){
    $slug = preg_replace('/[^a-z0-9-]+/', '-', strtolower($string));
    return $slug;
}
$otivi = "$tiitoo-$timoci";
$seofit = php_slug($otivi);
//// END GET TITLE    
    
////////////////
//$post = strip_tags($_POST['post']);
$post = strip_tags($_POST['gpost']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);


/// Youtube url
$gtube = strip_tags($_POST['gtube']);
$gtube = $db->real_escape_string($gtube); 
$gtube = preg_replace("#.*youtube\.com/watch\?v=#","",$gtube);
$gtube = preg_replace("#.*youtu\.be/#","",$gtube);

$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";

    if ($post != "") {
$artuxo = substr($post, 0, 10);        
$posta_staz = "$date_added.$artuxo.$timm";         
        
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";

//// Upload images    
if (isset($_FILES['grandfile'])) {

$file_name = $_FILES["grandfile"]["name"]; // The file name
$file_tmp = $_FILES["grandfile"]["tmp_name"]; // File in the PHP tmp folder
$type = $_FILES["grandfile"]["type"]; // The type of file it is
$file_size = $_FILES["grandfile"]["size"]; // File size in bytes
$file_error = $_FILES["grandfile"]["error"]; // 0 for false... and 1 for true

$file_ext = explode('.', $file_name);
$file_ext = strtolower(end($file_ext));


$file_name_new = uniqid('', true) . '.' . $file_ext;



if(move_uploaded_file($file_tmp, "user/$user/posts/$file_name_new")){


$allowed = array('jpg', 'jpeg', 'gif', 'png');

if (in_array($file_ext, $allowed)){

if ($file_error === 0){

if ($file_size <= 10485760){
    
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

}
/// Upload Multiple Files Script
if (isset($_FILES['gfiles'])) {
/////
$filename = $_FILES['gfiles']['name'];
$tmpname = $_FILES['gfiles']['tmp_name'];
/////    
foreach($_FILES['gfiles']['name'] as $i => $name) {

        
	$name = $_FILES['gfiles']['name'][$i];
	$size = $_FILES['gfiles']['size'][$i];
	$type = $_FILES['gfiles']['type'][$i];
	$tmp = $_FILES['gfiles']['tmp_name'][$i];

	$explode = explode('.', $name);

	$ext = end($explode);

	$path = "user/$user/multiple/";
	$path = $path . basename( $explode[0] . time() .'.'. $ext);
	
	$errors = array();

	if(empty($_FILES['gfiles']['tmp_name'][$i])) {
		$errors[] = 'Please choose at least 1 file to be uploaded.';
	}else {

		$allowed = array('jpg','jpeg','gif','bmp','png','JPG','JPEG','GIF','BMP','PNG');

		$max_size = 10485760; // 10MB

		if(in_array($ext, $allowed) === false) {
			$errors[] = 'The file <b>'.$name.'</b> extension is not allowed.';
		}

		if($size > $max_size) {
			$errors[] = 'The file <b>'.$name.'</b> size is too high.';
		}

	}

	if(empty($errors)) {
		
		

		if(move_uploaded_file($tmp, $path)) {
                    
                ///////////   
include_once("crop_resize.php");                    
                    
$resized_mut = "$path";
////// Condition
$datmultex = getimagesize($path);
$widmultex = $datmultex[0];
$hemultex = $datmultex[1];
////// Condition
if($size < 1048576){
$wpath = $widmultex;
$hpath = $hemultex;    
}
////////
else {
$wpath = $widmultex / 4;
$hpath = $hemultex / 4;
}
////////

  

////////
multiple_resize($path, $resized_mut, $wpath, $hpath, $ext);
                //////////    
			
                        ///////////    
                  for($i=0; $i<=count($tmp)-1;$i++){
                      
                      $query = $db->query("INSERT INTO imgz(name,image,photo_id) VALUES ('$user','$path','$posta_staz')");
                  }  
                //////////    
			$alatt = '<p>Photo uploads were successful...</p>';
                        $moreep = "<p><img src='$path'></p>";
                        
		}else {
			$alatt = 'Something went wrong while uploading the file <b>'.$name.'</b>';
		}

	}else {
		foreach($errors as $error) {
			$alatt = '<p>'.$error.'<p>';
		}
	}

}

}
/// Upload Multiple Files Script end

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

//// Database insert query

if($lacrix > 0){
///// GET ADSENSE CODE    
$get_adsense = $db->query("SELECT * FROM posts WHERE empty1='crimson' AND date_added > '$adpost' ORDER BY id DESC LIMIT 3");
$cadsense = $get_adsense->num_rows;
if($cadsense == 3){ 
    $adcode = "adsense";
}
else {
    $adcode = "";
}
///// END GET ADSENSE CODE 
}
else {
    include("code_query.php");
}

////// Insert Query Option 1
if ($cvazz == 0){
$sqlCommand = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','$statcrix',?,'$date_added','$adcode','','','','','$posta_staz',?,'','$seofit','','','')";  
$query = $db->prepare($sqlCommand) or die ($db->error());
$query->bind_param("sss", $post, $tiitoo, $gtube);
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
    
$sqlCommanda = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','$statcrix',?,'$date_added','$adcode','','','','','$posta_staz',?,'','$seofit','','','')";  
$querya = $db->prepare($sqlCommanda) or die ($db->error()); 
$querya->bind_param("sss", $post, $tiitoo, $gtube);
$querya->execute();

$infa = $db->query("UPDATE hash_tag SET hash_num='$incc' WHERE hash_word='$par' AND date_created ='$date_added'");

}
///// End Query

if($cadsense == 3){
$info_three = $db->query("UPDATE users SET adsenze='$timm' WHERE username='$user'");  
}

//// End database insert query
echo "Chirp update was successful";
    }
 //////////////////////// END USER LOGIN                 
                 
}
?>

