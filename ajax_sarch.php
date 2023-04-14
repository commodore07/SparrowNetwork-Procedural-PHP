<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$term = (!empty($_GET['term']) ? $_GET['term'] : null);
$term = $db->real_escape_string($term); 
$term = str_replace("'","&apos;", $term);

$post = "$term";
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
$getposts->bind_param("ss", $post, $post);
$getposts->execute();
$getposts = $getposts->get_result();

include("search_loop.php");
?>



 