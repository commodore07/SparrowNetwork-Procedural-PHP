<?php 
function count_down($lapse_time){                                                
$current = time();
$subter = $lapse_time - $current;

$minex = floor($subter / 60);
$harex = floor($subter / 3600);
$darex = floor($subter / 86400);

$r_minex = floor(($subter - ($harex * 3600))/60);
$r_secex = floor($subter - ($minex * 60));

///// COUNTDOWN CONDITION
if($harex < 0){
    $harex = "0";
    $r_minex = "0";
    $r_secex = "0";
}
    
$lapsez = "$harex hrs : $r_minex mins : $r_secex secs";

return $lapsez;
}
?>