<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>


<?php
include("countdown_func.php");

$getposts = $db->query("SELECT * FROM ponzee WHERE username='$user'" ) or die($db->error());
while ($row = $getposts->fetch_assoc()) {
                                                $timlapse = $row['ph_timerem'];
                                                $ago_lapse = count_down($timlapse);
}
 ?>

<?php echo "$ago_lapse"; ?>