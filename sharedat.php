<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$time_sent = time();
?>

<?php include("ago.php"); ?>	

<?php 
$getid = strip_tags($_POST['getid']);
$getid = $db->real_escape_string($getid); 
////////
$getU = strip_tags($_POST['getU']);
$getU = $db->real_escape_string($getU);
////////
$post = strip_tags($_POST['arteec']);
$post = $db->real_escape_string($post); 
$post = str_replace("\'", "&apos;", $post);

if ($getid != "" && $post != "") {
    
//// Comment Condition
if($user == ""){
    $user = "anonymous";
}
else {
    $user = "$user";
}
////     
    
$date_added = date("Y-m-d");
$timm = time();
$added_by = "$user";
$user_posted_to = "$user";
/// Get photo
$get_photox = $db->query("SELECT * FROM posts WHERE id='$getid'");
$rollin = $get_photox->fetch_assoc();
$laxip = $rollin['profile'];
$laboxip = $rollin['body'];
$share_time = $rollin['date_added'];
$lavee2 = $rollin['vee2'];
$leetux = $rollin['youtube_url'];

$sqlvix = "INSERT INTO posts VALUES('',?,'$timm','$added_by','$user_posted_to','$laxip','$getU','','share','','$date_added','','','$laboxip','$share_time','','$lavee2','$leetux','','','','','')";  
$quevix = $db->prepare($sqlvix) or die ($db->error()); 
$quevix->bind_param("s", $post);
$quevix->execute();

///// Share Count
$u_checkcant = $db->query("SELECT * FROM share WHERE like_id='$getid' AND liker='$user'");
// Count the amount of rows where username = $un
$checkeet = $u_checkcant->num_rows;
if ($checkeet == 0) {
$db->query("INSERT INTO share VALUES('','$getid','$getU','$user')");
  }
///// End Share Count
///// end Notifier
echo "Your reply was successfully posted...";
}
?>