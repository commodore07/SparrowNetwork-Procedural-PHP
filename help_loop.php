<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$followe = $row['receiver'];
                                                $paidstazz = $row['paid_status'];
                                                $umatchph = $row['amt_matched'];
                                                if($umatchph == ""){
                                                    $umatchph = "0";
                                                } else {
                                                    $umatchph = "$umatchph";
                                                }
                                                $umatchph = number_format($umatchph);
                                                $timlapse = $row['time_elapse'];
                                                $ago_lapse = count_down($timlapse);


                                                
                                                
$get_ponxe = $db->query("SELECT * FROM ponzee WHERE username='$followe'");
$get_ponx = $get_ponxe->fetch_assoc();
$accnoe = $get_ponx['account_number'];
$baknae = $get_ponx['bank_name'];  
$sparconnn = $get_ponx['spar_coun'];

///// GET CURRENCY CODE
$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code']; 
                                                
$get_user = $db->query("SELECT * FROM users WHERE username='$followe'");
$get_ufo = $get_user->fetch_assoc();
$funame = $get_ufo['fullname'];
$usename = $get_ufo['username'];  
$pro_crop = $get_ufo['profilecrop_pic'];
$poknae = $get_ufo['phone']; 

                                                /// Profile pic Begins
                                                if ($pro_crop == "") {
                                                    $proc="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $proc="$pro_crop";
                                                }
                                                /// Profile pic Ends
$back_crop = $get_ufo['backgroundcrop_pic']; 
                                                /// Profile pic Begins
                                                if ($back_crop == "") {
                                                    $broc="img/backgroundcrop_pic.jpg";
                                                }
                                                else{
                                                    $broc="$back_crop";
                                                }
                                                /// Profile pic Ends
?>
	  
<!-- Post Content
================================================= -->
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                  	<img src="<?php echo $broc; ?>" alt="profile-cover" class="img-responsive cover" />
                  	<div class="card-info">
                      <img src="<?php echo $proc; ?>" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
                      
                        <?php include 'follow_inc.php'; ?>  
                      	<h5><a href="./<?php echo $usename; ?>" class="profile-link"><?php echo $funame; ?></a></h5>
                        <p>@<a href="<?php echo $usename; ?>"><?php echo $usename; ?></a></p>
<script>
$(document).ready(function() {
    $('#deqopop<?php echo $id; ?>').click(function() {
    document.getElementById("popid").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("reqppop").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var rejid = "<?php echo $id; ?>";
    $.post('conf_disp.php',{rejid: rejid},function(data) {
        $("#reqppop").html(data);
    });
});
});
</script>                           
                        
                       
                        Account name: <?php echo $funame; ?> <br>
                        Account number: <?php echo $accnoe; ?> <br>
                        Bank: <?php echo $baknae; ?> <br>
                        Phone number: <?php echo $poknae; ?><br>
                        Amount: <?php echo $renzie; ?><?php echo $umatchph; ?>
                        <?php
                        if($user != "support"){
                        ?>
                        <a id="deqopop<?php echo $id; ?>" title="Upload pop" class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".uploadpop">Upload POP</a>
                        <?php
                        }
                        ?><br>
<style>
@font-face{
 font-family:'digital-clock-font';
 src: url('digitfont.ttf');
}
</style>   

<?php 
$get_popiq = $db->query("SELECT * FROM pay_proof WHERE payme_id='$id'");
$get_povoq = $get_popiq->fetch_assoc();
$paidid = $get_povoq['payme_id'];
$paycaant = $get_popiq->num_rows;
/////// CONDITION 1
if($paycaant > 0  && $paidstazz != "case"){
?>
<span id="helploadcoux<?php echo $id; ?>" style="font-family: digital-clock-font; font-size: 18px; font-weight: 700; color: green;"><?php echo "$ago_lapse"; ?></span><br>
<?php
} else if($paycaant > 0 && $paidstazz == "case"){
?>    
<span style='font-weight: 700'><img src="./css/emoji/hammer.png"> <img src="./css/emoji/cop.png"> CASE 101</span><br>  
<?php
} else{
?>
<span id="helploadcoux<?php echo $id; ?>" style="font-family: digital-clock-font; font-size: 18px; font-weight: 700; color: blue;"><?php echo "$ago_lapse"; ?></span><br>
<?php 
}
?>

<?php 
$reever = "$followe";
$receiver = "$followe";

$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
if($cabodx < 1){
?>
<script>
$(document).ready(function() {
    $('#deqoii<?php echo $id; ?>').click(function() {
    document.getElementById("terminaqoi").innerHTML="<?php echo $followe; ?>"; 
    document.getElementById("requoqoi").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var rezqooi = "<?php echo $id; ?>";
    $.post('conf_disp.php',{rejid: rezqooi},function(data) {
        $("#requoqoi").html(data);
    });
});
});
</script>
<?php
if($user != "support"){
?>
<a id="deqoii<?php echo $id; ?>" title="Send a private message" class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".privmessage">Private message</a>
<?php
}
?>
<?php 
} else {
//////// Get Body
$get_bodx = $db->query("SELECT * FROM msg_reply WHERE sender = '$user' AND receiver= '$receiver' OR sender = '$receiver' AND receiver= '$user' ORDER BY id DESC LIMIT 1");
$cabodx = $get_bodx->num_rows;
$rollin = $get_bodx->fetch_assoc();
$bodx = $rollin['message']; 
$emp1 = $rollin['emp1']; 
$timolee = $rollin['time']; 
$bazever = $rollin['receiver']; 
$latime = $rollin['time']; 
$senzzar = $rollin['sender']; 
$idv = $rollin['id']; 
$gotime = time_ago($latime);
//// if else statement
if($senzzar == "$user"){
    $receivask = "$bazever";
}
else {
    $receivask = "$senzzar";
}
//// ends    
?>

<script>   
$(document).ready(function() {
    $('#chatit<?php echo $id; ?>').click(function() {   
    document.getElementById("chazynew").innerHTML = "<center><img src='./loader2.gif'></center>";   
    document.getElementById("chatgic").innerHTML = "<center><img src='./loader2.gif'></center>";     
    var log_magicnew = document.getElementById("chatgic");
               // jquery fade-out fade-in begins
                $("#chatgic").delay(1000).fadeOut("slow", function() {
                    log_magicnew.innerHTML = "";	        
                });
                $("#chatgic").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends         
    var fn = "<?php echo $timolee; ?>";
    document.getElementById("id_chat").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("added_chat").innerHTML="<?php echo $receiver; ?>";
    document.getElementById("tima_chat").innerHTML="<?php echo $timolee; ?>";     
    $.post('chatz.php?uzar=<?php echo $bazever; ?>&I=<?php echo $idv; ?>&recaz=<?php echo $receiver; ?>&sedaz=<?php echo $senzzar; ?>',{post: fn},function(data) {
        //// Profile pic small
         var reva = "<?php echo $receiver; ?>";
        $.post('cheezi3.php',{reva: reva, timox: fn},function(data) {   
	$("#chazynew").html(data);
        $('#chartex').scrollTop($('#chartex')[0].scrollHeight);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $receiver; ?>";
        $.post('chattime.php',{chiv: chiv},function(data) {   
	$("#tima_chat").html(data);
        });
        ///// end 
        $("#spartox").html(data);                
    });
});
});
</script>     
<?php
if($user != "support"){
?>
<a id="chatit<?php echo $id; ?>" data-toggle="modal" data-target=".chatmod" title="Send a private message" class="text-green" style="cursor: pointer;">Private message
<?php
}
?>    

    <div class="pull-left" id="lealert<?php echo $id; ?>">            
                            <?php 
                            if($emp1 == "seen" && $bazever != "$user"){
                            ?>
                                        <div class="seen">
                                            <i style="color: blue;" class="icon ion-checkmark-round"></i>
                                        </div>
                            <?php 
                            } else if($emp1 != "seen" && $bazever != "$user"){
                            ?>
                                        <div class="seen">
                                            <i class="icon ion-checkmark-round"></i>
                                        </div>
                            <?php 
                            } else if($bazever == "$user" && $emp1 != "seen"){
                            ///// Count unread chats
                            $get_chazz = $db->query("SELECT * FROM msg_reply WHERE sender = '$senzzar' AND receiver = '$user' AND emp1 != 'seen'");
                            $cachazz = $get_chazz->num_rows;    
                            ///////// End count    
                            ?>
                                        <div class="messagesk"><?php echo $cachazz; ?></div>
                            <?php 
                            } 
                            ?>
                            </div></a>

                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#lealert<?php echo $id; ?>').load('msgrefresh.php?didi=<?php echo $idv; ?>&S=<?php echo $senzzar; ?>&R=<?php echo $receivask; ?>&Ree=<?php echo $reever; ?>&ideex=<?php echo $id; ?>');
                                      }, 2000);  
                                    });
                                    </script> 

<?php
}
?>


<?php
if($paycaant > 0 && $receiver == "$user"){
include("reportpop.php"); 
}
?>
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#helploadcoux<?php echo $id; ?>').load('loadzcounx.php?id=<?php echo $id; ?>');
                                      }, 1000);  
                                    });
                                    </script>     

<?php
}
?>

