<?php 

function time_ago($cur_time){
$time = "1";    
$time_ = time() - $cur_time;


$seconds = $time_;
$minutes = round($time_ / 60);
$hours = round($time_ / 3600);
$days = round($time_ / 86400);
$weeks = round($time_ / 604800);
$months = round($time_ / 2419200);
$years = round($time_ / 29030400);


// seconds
if ($seconds == 0){

$time = "1 sec";

}

else if ($seconds <= 60){

$time = "$seconds sec";

}
// minutes
else if ($minutes <= 60)

{

if ($minutes == 1){
$time = "1 min";
}

else 
{

$time = "$minutes mins";

}
}
// hours
else if ($hours<=24){

if ($hours==1){

$time = "1 hr";

}

else

{

$time = "$hours hrs";

}

}
//days
else if ($days<= 7){

if ($days == 1){

$time = "1 day";

}

else 
{

$time = "$days days";

}


}

//weeks

else if ($weeks<= 4){

if ($weeks == 1){

$time = "1 wk";

}

else {

$time = "$weeks wks";

}

}

//months
else if ($months<= 12){

if ($months == 1){

$time = "1 month";

}

else {

$time = "$months months";

}

}



//years
else if ($years<= 12){

if ($years == 1){

$time = "1 year";

}

else {

$time = "$years years";

}

}

return $time;

}
?>