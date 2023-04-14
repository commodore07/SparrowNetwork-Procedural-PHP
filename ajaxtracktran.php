<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$username = $_GET['U'];
$username = $db->real_escape_string($username); 
$username = str_replace("'","&apos;", $username);

$tandee = $_GET['TD'];
$tandee = $db->real_escape_string($tandee); 
$tandee = str_replace("'","&apos;", $tandee);

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$getposts = $db->prepare("SELECT * FROM my_customers WHERE seller=? AND search_date=? AND le_status='goods' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
$getposts->bind_param("ss", $username, $tandee);
$getposts->execute();
$getposts = $getposts->get_result();

include("track_loop.php");
?>



 