<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$code = (!empty($_GET['code']) ? $_GET['code'] : null);
$code = $db->real_escape_string($code); 
$code = str_replace("'","&apos;", $code);
?> 

<?php 
 $recuse = strip_tags(@$_POST['recuse']);
 $recuse = $db->real_escape_string($recuse); 
 $recuse = str_replace("'", "&apos;", $recuse);
 
 $recmail = strip_tags(@$_POST['recmail']);
 $recmail = $db->real_escape_string($recmail); 
 $recmail = str_replace("'", "&apos;", $recmail);
 
 $date_added = date("Y-m-d");
 $timm = time();
 
if($recuse == $recmail && $recuse != "" && $recmail != ""){
$new_password_md5 = md5($recuse);

//Submit the form to the database
    $info_submit_query = $db->query("UPDATE users SET password='$new_password_md5' WHERE noteen1='$code'");
        
    echo "Password reset was successful";
} else {
    echo "Your passwords do not match...";
}
   
?>