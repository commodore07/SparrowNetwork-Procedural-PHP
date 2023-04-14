<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>
<?php include("ago.php"); ?>
<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
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

$query_follow = "SELECT * FROM ponzee WHERE";

foreach ($follzie as $each){
    $i++;
    //echo $i.'<p>&nbsp;</p>';

    if ($i == 1)
    {
        $query_follow .= " username = '$each' && unmatched_gh !='' && unmatched_gh != '0' && spar_coun='$sparconnn'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR username = '$each' && unmatched_gh !='' && unmatched_gh != '0' && spar_coun='$sparconnn'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);
$getposts = $db->query("$query_follow ORDER BY id DESC LIMIT ".$load.",10") or die($db->error());
include ("while_ghpool.php");
?>



 