<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php
$id = $_GET['id'];
$id = $db->real_escape_string($id); 
$id = str_replace("'","&apos;", $id);

include("countdown_func.php");

$getposts = $db->query("SELECT * FROM ponzee WHERE id='$id'" ) or die($db->error());
while ($row = $getposts->fetch_assoc()) {
                                                $timlapse = $row['cabal_lapse'];
                                                $ago_lapse = count_down($timlapse);
}
 ?>

<?php echo "$ago_lapse"; ?>