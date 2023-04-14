<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 
 $foll_val = str_replace("'", "&apos;", $foll_val);

if ($user != "") {
$get_phot = $db->query("SELECT * FROM posts WHERE id='$foll_val'");
$rollin = $get_phot->fetch_assoc();
$pro_pic = $rollin['profile'];   
$vee1 = $rollin['vee1'];  
$vee2 = $rollin['vee2']; 
$sharee = $rollin['sharee'];  
    //Submit the form to the database
if($pro_pic != "" && $sharee == ""){
    unlink($pro_pic);
}
if($vee1 != ""){
$get_tee = $db->query("SELECT * FROM tradefair WHERE brand='$vee1'");
$rolliw = $get_tee->fetch_assoc();
$tidd = $rolliw['id']; 
$lapic = $rolliw['pic']; 
$acpic = $rolliw['actual_pic']; 
unlink($lapic);
$info_submit_teeaz = $db->query("DELETE FROM tradefair WHERE id='$tidd'");
} 
if($vee2 != ""){
$get_qax = $db->query("SELECT * FROM imgz WHERE photo_id='$vee2'");
$infcoo = $get_qax->num_rows;
if($infcoo > 0){
while ($rollaq = $get_qax->fetch_assoc()) {
$delmage = $rollaq['image']; 
unlink($delmage);
}
$info_submit_delmage = $db->query("DELETE FROM imgz WHERE photo_id='$vee2'");
}
}
    $info_submit_query = $db->query("DELETE FROM posts WHERE id='$foll_val'"); 
    $info_submit_likes = $db->query("DELETE FROM likes WHERE like_id='$foll_val'"); 
    $info_submit_share = $db->query("DELETE FROM share WHERE like_id='$foll_val'"); 
    $info_submit_postcomments = $db->query("DELETE FROM post_comments WHERE post_id='$foll_val'"); 
    $info_submit_notify = $db->query("DELETE FROM notify WHERE event_id='$foll_val'"); 
    $info_submit_query = $db->query("DELETE FROM notifications WHERE event_id='$foll_val'"); 
    echo "Deleted";
  }
  else
  {
   /// do nothing...
  }


?>