<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php
$ago_lapse = "0 hrs : 0 mins : 0 secs";

$id = $_GET['id'];
$id = $db->real_escape_string($id); 
$id = str_replace("'","&apos;", $id);

include("countdown_func.php");

$getposts = $db->query("SELECT * FROM match_ph WHERE id='$id'" ) or die($db->error());
while ($row = $getposts->fetch_assoc()) {
                                                $timlapse = $row['time_elapse'];
                                                $ago_lapse = count_down($timlapse);
}
 ?>

<?php echo "$ago_lapse"; ?>