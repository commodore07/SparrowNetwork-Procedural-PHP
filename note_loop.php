<?php 
while ($roz = $getinftee->fetch_assoc()) {
    
                                                $lanom = $roz['username'];
                                                $laev = $roz['event'];
                                                $laevid = $roz['event_id'];
                                                $latim = $roz['time'];
                                                $agov_time = time_ago($latim);
                                                $emp1 = $roz['emp1'];
                                                $emp2 = $roz['emp2'];
                                                $emp3 = $roz['emp3'];
                                                $id = $roz['id'];
                                                
$getinfteef = $db->query("SELECT * FROM users WHERE username='$emp1'" ) or die($db->error());
while ($roz = $getinfteef->fetch_assoc()) {
    $uni = $roz['vac3'];
    $fulnam = $roz['fullname'];
    $pcrop = $roz['profilecrop_pic'];
    if($pcrop == ""){
        $pcrop = "./img/default_pic.jpg";
    }
    else {
        $pcrop = "$pcrop";
    }
}

if($laev == "like"){
    $lastaxiz = "Liked your chirp";
}
else if($laev == "share"){
    $lastaxiz = "Replied your chirp";
} else if($laev == "invite"){
    $lastaxiz = "Invited you to join a group page";
} else if($laev == "folloya"){
    $lastaxiz = "Started following you";
}
else if($laev == "comment"){
    $lastaxiz = "Commented on your chirp";
}
?> 

<?php 
if($laev != "invite" || $laev != "folloya"){
?>                      
<?php 
$get_noq = $db->query("SELECT * FROM post_comments WHERE post_id='$laevid' ORDER BY id DESC LIMIT 10");
$rolva = $get_noq->fetch_assoc();
$timenoq = $rolva['time'];
?>

<script>   
$(document).ready(function() {
    $('#comtex<?php echo $id; ?>').click(function() {
    document.getElementById("kinalee").innerHTML = "<center><img src='./loader2.gif'></center>";    
    document.getElementById("magic").innerHTML = "<center><img src='./loader2.gif'></center>";   
    document.getElementById("magicnew").innerHTML = "<center><img src='./loader2.gif'></center>"; 
    var log_magicnew = document.getElementById("magicnew");
               // jquery fade-out fade-in begins
                $("#magicnew").delay(1000).fadeOut("slow", function() {
                    log_magicnew.innerHTML = "";	        
                });
                $("#magicnew").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends    
    var fn = "<?php echo $timenoq; ?>";
    document.getElementById("id_nox").innerHTML="<?php echo $laevid; ?>"; 
    document.getElementById("added_nox").innerHTML="<?php echo $lanom; ?>";
    document.getElementById("timazzoq").innerHTML="<?php echo $timenoq; ?>";     
    $.post('commetz.php?I=<?php echo $laevid; ?>',{post: fn},function(data) {
        //// Profile pic small
        var comid = "<?php echo $laevid; ?>";
        $.post('cheezi2.php',{comid: comid},function(data) {
	$("#magic").html(data);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $laevid; ?>";
        $.post('chivtime.php',{chiv: chiv},function(data) {   
	$("#timazzoq").html(data);
        });
        ///// end 
        //// Clear alerts
        var comizz = "<?php echo $laevid; ?>";
        $.post('alertz.php?E=<?php echo $laev; ?>',{comizz: comizz},function(data) {
	$("#cleartz<?php echo $id; ?>").html(data);
        });
        ///// end clear alerts
        $("#kinalee").html(data);                
    });
});
});
</script>     

<?php 
}
?>

<?php 
$get_lert = $db->query("SELECT * FROM notifications WHERE event_id='$laevid' AND event='$laev' AND status='no' AND notifier !='$user'");
$likvetz = $get_lert->num_rows;
$rollin = $get_lert->fetch_assoc();
$leat = $rollin['event'];
$noftaxaq = $rollin['notifier'];
///////// CONDITION 2
$get_caqo = $db->query("SELECT * FROM notifications WHERE username='$user' AND event='invite' AND status='no' AND notifier ='$emp1'");
$likaco = $get_caqo->num_rows;

///// Get follow count
$get_xoya = $db->query("SELECT * FROM notifications WHERE username='$user' AND event='folloya' AND status='no' AND notifier ='$emp1'");
$xoyaco = $get_xoya->num_rows;
//// End get follow count

if($laev == "invite"){
    $likvetz = "$likaco";
} else if($laev == "folloya"){
    $likvetz = "$xoyaco";
}
else {
    $likvetz = "$likvetz";
}
//////// END CONDITION 2

///// Condition
$get_stxo = $db->query("SELECT * FROM note_statuz WHERE event_id='$laevid' AND event='$laev'");
$likxoe = $get_stxo->num_rows;
$likdiv = $likxoe - 1;

if($likxoe == 0 || $likxoe == 1){
    $odax = "";
}
else if($likxoe == 2){
    $odax = "and 1 other person";
}
else if($likxoe > 2) {
    $odax = "and $likdiv other people";
}
///// End condition    
//// STATEMENT
if($likvetz > 0){
    $nostx = "<div class='chat-alert'>$likvetz</div>";
}
else {
    $nostx = "";
}
?>

<?php 
if($laev == "invite" || $laev == "folloya"){
    $leaxay = "givite";
}
else {
    $leaxay = "comments";
}
?>

<?php 
if($laev == "invite" || $laev == "folloya"){
?>
<script>
$(document).ready(function() {
    $('#comtex<?php echo $id ?>').click(function() {
    var follo = "<?php echo $id; ?>";
    $.post('accinv.php?UN=<?php echo $emp1; ?>',{follo: follo},function(data) {
        $("#addsez").html(data);
                        //// Clear alerts
                        var comizz = "<?php echo $emp1; ?>";
                        $.post('alertzeex.php?E=<?php echo $laev; ?>',{comizz: comizz},function(data) {
	                  $("#cleartz<?php echo $id; ?>").html(data);
                        });
                        ///// end clear alerts
    });
});
});
</script>
<?php 
}
?>

                    <li id="comtex<?php echo $id; ?>" data-toggle="modal" data-target=".<?php echo $leaxay; ?>">
                      <a href="#contact-1" data-toggle="tab">
                        <div class="contact">
                        	<img src="<?php echo $pcrop; ?>" alt="" class="profile-photo-sm pull-left"/>
                        	<div class="msg-preview">
                        		<h6><?php echo "$fulnam $odax"; ?></h6>
                        		<p class="text-muted"><?php echo $lastaxiz; ?></p>
                                        <small class="text-muted"><?php echo $agov_time; ?> ago</small>
                                        <div id="cleartz<?php echo $id; ?>"><?php echo $nostx; ?></div>
                        	</div>
                        </div>
                      </a>
                    </li>
         
<?php 
}
?>