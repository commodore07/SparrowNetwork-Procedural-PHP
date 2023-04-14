<?php 
$get_hegrix = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolgrix = $get_hegrix->fetch_assoc();
$umatchgeeh = $rolgrix['unmatched_gh'];

while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$followe = $row['username'];
                                                $accnoe = $row['account_number'];
                                                $baknae = $row['bank_name'];
                                                $zazezu = $row['unmatched_ph'];
                                                $umatchph = $row['unmatched_ph'];
                                                
                                                $umatchgh = $row['unmatched_gh'];
                                                if($umatchgh == ""){
                                                    $umatchgh = "0";
                                                } else {
                                                    $umatchgh = "$umatchgh";
                                                }
                                                $umatchgh = number_format($umatchgh);
                                                if($umatchph == ""){
                                                    $umatchph = "0";
                                                } else {
                                                    $umatchph = "$umatchph";
                                                }
                                                $umatchph = number_format($umatchph);
                                                
                                                $timlapse = 0;
                                                $ago_lapse = count_down($timlapse);
///// GET CURRENCY                                                 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$followe'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];

$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code'];                                                       
///// END GET CURRENCY                                                
$get_user = $db->query("SELECT * FROM users WHERE username='$followe'");
$get_ufo = $get_user->fetch_assoc();
$funame = $get_ufo['fullname'];
$artteez = substr($funame, 0, 12);
    if (strlen($funame) > 11) {
        $funame = "$artteez...";
    }
    else {
        $funame = "$funame";
    }
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
    $('#deqoe<?php echo $id; ?>').click(function() {
    document.getElementById("revevminam").innerHTML="<?php echo $user; ?>";  
    document.getElementById("amvoq").innerHTML="<?php echo $umatchgeeh; ?>";
    document.getElementById("pavoq").innerHTML="<?php echo $followe; ?>";
    document.getElementById("revevdisp").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var rejid = "<?php echo $followe; ?>";
    $.post('pool_disp.php?amvo=<?php echo $zazezu; ?>&&pavo=<?php echo $user; ?>',{rejid: rejid},function(data) {
        $("#revevdisp").html(data);
    });
});
});
</script>                           
                        
                        <a id="deqoe<?php echo $id; ?>" title="Get help" class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".matchreceive"><i class="fa fa-money"></i> Get help</a><br>                                      
                        
                        Account name: <?php echo $funame; ?> <br>
                        Account number: <?php echo $accnoe; ?> <br>
                        Bank: <?php echo $baknae; ?> <br>
                        Phone number: <?php echo $poknae; ?><br>
                        Amount: <?php echo $renzie; ?><?php echo $umatchph; ?><br>
                     
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
?>