<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$id = $_GET['I'];
$id = $db->real_escape_string($id); 
$id = str_replace("'","&apos;", $id);

$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load);

$getinftee = $db->prepare("SELECT * FROM product_statuz WHERE prod_id = ? ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
$getinftee->bind_param("s", $id);
$getinftee->execute();
$getinftee = $getinftee->get_result();

include("while_trackex.php");
?>



 