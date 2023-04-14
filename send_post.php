<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


 <?php include("ago.php"); ?>

<?php 
///// Lastpost check
$getinfiix = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfiix->fetch_assoc();
$lastpost = $roz['online'];
$adpost = $roz['adsenze'];
///// End lastpost check
?>

<?php
$par = "none";
$resized_file = "";

///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
////////////////
//$post = strip_tags($_POST['post']);
$post = strip_tags($_POST['postax']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);


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
if (isset($_FILES['file1'])) {

$file_name = $_FILES["file1"]["name"]; // The file name
$file_tmp = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$type = $_FILES["file1"]["type"]; // The type of file it is
$file_size = $_FILES["file1"]["size"]; // File size in bytes
$file_error = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

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
if (isset($_FILES['files'])) {
/////
$filename = $_FILES['files']['name'];
$tmpname = $_FILES['files']['tmp_name'];
/////    
foreach($_FILES['files']['name'] as $i => $name) {

        
	$name = $_FILES['files']['name'][$i];
	$size = $_FILES['files']['size'][$i];
	$type = $_FILES['files']['type'][$i];
	$tmp = $_FILES['files']['tmp_name'][$i];

	$explode = explode('.', $name);

	$ext = end($explode);

	$path = "user/$user/multiple/";
	$path = $path . basename( $explode[0] . time() .'.'. $ext);
	
	$errors = array();

	if(empty($_FILES['files']['tmp_name'][$i])) {
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

//// Database insert query
    
include("code_query.php");

////// Insert Query Option 1
if ($cvazz == 0){
$sqlCommand = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','','','$date_added','$adcode','','','','','$posta_staz','','','','','','')";  
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
    
$sqlCommanda = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$resized_file','','','','','$date_added','$adcode','','','','','$posta_staz','','','','','','')";  
$querya = $db->prepare($sqlCommanda) or die ($db->error()); 
$querya->bind_param("s", $post);
$querya->execute(); 

$infa = $db->query("UPDATE hash_tag SET hash_num='$incc' WHERE hash_word='$par' AND date_created ='$date_added'");

}
///// End Query

if($cadsense == 3){
$info_three = $db->query("UPDATE users SET adsenze='$timm' WHERE username='$user'");  
}

//// End database insert query
    }
 //////////////////////// END USER LOGIN 
    ?>
<?php 
$i = "";	  								  
$sql_follow = "SELECT * FROM follows WHERE follower='$user'";								  
$getfolls = $db->query($sql_follow);
$ccco = $getfolls->num_rows;
if($ccco == 0){
    $follzie[] = "0";
}
else {
while($arr = $getfolls->fetch_array()) {
    $follzie[] = $arr['followe'];   
}
}

$query_follow = "SELECT * FROM posts WHERE";

foreach ($follzie as $each){
    $i++;
    //echo $i.'<p>&nbsp;</p>';

    if ($i == 1)
    {
        $query_follow .= " added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added > '$lastpost'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added > '$lastpost'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);

$getposts = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' && date_added > '$lastpost' ORDER BY id DESC ") or die($db->error());
include("while_loop.php");
?>
<?php                 
}
?>

