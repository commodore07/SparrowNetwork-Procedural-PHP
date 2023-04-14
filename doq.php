<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

 <?php include("ago.php"); ?>


<?php
///////////// CHECK IF USER IS LOGGED IN
if($user != ""){
$uzzaname = $_GET['UK']; 
$uzzaname = $db->real_escape_string($uzzaname); 
$uzzaname = str_replace("'","&apos;", $uzzaname);
////////////////
$post = strip_tags($_POST['doqmsg']);
$post = $db->real_escape_string($post); 
$post = str_replace("'", "&apos;", $post);

$doqamt = strip_tags($_POST['doqamt']);
$doqamt = $db->real_escape_string($doqamt); 
$doqamt = str_replace("'", "&apos;", $doqamt);

$sachdate = date('d/m/Y');
$timm = time();
$ex_tim = date("h:i:sa");

if ($post != "" && $user != "") {

$sqlchat = "INSERT INTO my_expenses VALUES('',?,?,?,?,?,?,?)";  
$quechat = $db->prepare($sqlchat) or die ($db->error()); 
$quechat->bind_param("sssssss", $uzzaname, $post, $doqamt, $sachdate, $timm, $user, $ex_tim);
$quechat->execute();

echo "Update was successful...";
} else {
    echo "Fill in all fields!";
}
}
?>

