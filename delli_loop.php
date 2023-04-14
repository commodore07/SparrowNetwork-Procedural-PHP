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

$receiver = "$lanom";
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

                    <li>
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
                        
                         <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable delete</strong></div>
                          <p>Enable this if you want to delete this notification</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label id="delstat<?php echo $id; ?>" class="switch">
                           

<input id="follow_activ<?php echo $id; ?>" type="checkbox">

                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#follow_activ<?php echo $id; ?>').click(function() {
    var foll_val = "<?php echo $laevid; ?>";
    $.post('deletenex.php',{foll_val: foll_val},function(data) {
        $("#delstat<?php echo $id; ?>").html(data);
    });
});
});
</script>
                      
                  </div> 
                        
                    </li>
         
<?php 
}
?>