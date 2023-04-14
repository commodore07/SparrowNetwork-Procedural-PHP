<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
 
<?php 
$username = $_GET['UX'];
$username = $db->real_escape_string($username); 
$username = str_replace("'","&apos;", $username);

$post = strip_tags($_POST['chakio']);
$post = $db->real_escape_string($post); 
$post = str_replace("'","&apos;", $post);
$tino = time();
if ($post != "" && $user != "") {
$getposts = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') AND username=? ORDER BY RAND() LIMIT 2" ) or die($db->error());
$getposts->bind_param("ss", $post, $username);
$getposts->execute();
$getposts = $getposts->get_result();

include("trade_loop.php");
}
?>
