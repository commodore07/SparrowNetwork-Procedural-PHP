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
        $query_follow .= " added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added > '$adpost'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR added_by = '$each' && wall!='wall' && empty1!='crimson' && date_added > '$adpost'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}

$getmag = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' && date_added > '$adpost' ORDER BY id DESC LIMIT 3") or die($db->error());
$cadsense = $getmag->num_rows;

if($cadsense == 3){ 
    $adcode = "adsense";
}
else {
    $adcode = "";
}
///// END GET ADSENSE CODE
?>