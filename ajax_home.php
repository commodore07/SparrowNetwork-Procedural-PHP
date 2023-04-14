<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>

<?php 
$getinfii = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfii->fetch_assoc();
$lastpost = $roz['online'];
?>

<?php 
$load = htmlentities(strip_tags($_POST['load'])) * 10;
$load = $db->real_escape_string($load); 

$i = "";	  								  
$sql_follow = "SELECT * FROM follows WHERE follower='$user'";								  
$getfolls = $db->query($sql_follow);
$ccco = $getfolls->num_rows;
if($ccco == 0){
    $follzie[] = "0";
}
else {
while($arr = $getfolls->fetch_array()) {
    $follzie[] = $arr['followe'];   
}
}

$query_follow = "SELECT * FROM posts WHERE";

foreach ($follzie as $each){
    $i++;
    //echo $i.'<p>&nbsp;</p>';

    if ($i == 1)
    {
        $query_follow .= " added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added<='$lastpost'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added<='$lastpost'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);
$getposts = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' && date_added<='$lastpost' ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include("while_loop.php");
?>



 