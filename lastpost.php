<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>

<?php 
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
        $query_follow .= " added_by = '$each' && wall!='wall' && empty1!='crimson' ";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR added_by = '$each' && wall!='wall' && empty1!='crimson' ";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);
$getlasx = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' ORDER BY id DESC LIMIT 1") or die($db->error());
$infolasx = $getlasx->num_rows;
$rollin = $getlasx->fetch_assoc();
$latim = $rollin['date_added'];
$info_subasx = $db->query("UPDATE users SET online='$latim', adsenze='$latim' WHERE username='$user'"); 
?>
