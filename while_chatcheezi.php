<?php 
while ($comment = $get_comments->fetch_assoc()) {

$messaq = $comment['message'];
$senq = $comment['sender'];
$receiq = $comment['receiver'];
$time = $comment['time'];
$agoz_time = time_ago($time);
$lastaxiz = $comment['status'];
$body = "$messaq";
                                                $geto = $db->query("SELECT * FROM users WHERE username='$senq'");
                                                $get_infoz = $geto->fetch_assoc();
                                                $profilepic_infoz = $get_infoz['profilecrop_pic'];
                                                if ($profilepic_infoz == "") {
                                                 $profilepizz = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepizz = "$profilepic_infoz";
                                                }
												
//////////////////
                                                $getreq = $db->query("SELECT * FROM users WHERE username='$receiq'");
                                                $get_infreq = $getreq->fetch_assoc();
                                                $profilepic_infreq = $get_infreq['profilecrop_pic'];
                                                if ($profilepic_infreq == "") {
                                                 $profilepireq = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepireq = "$profilepic_infreq";
                                                }
												
												

?>
<?php include("tag.php"); ?>	
<?php include("chatty.php"); ?>	                

<?php
}	      
?>