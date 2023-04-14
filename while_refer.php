<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
                                                $cablast = $row['cablast_ph'];
                                                $cab_time = time_ago($cablast);
						$followe = $row['username'];
                                                $zazezu = $row['unmatched_ph'];
                                                $umatchgeeh = $row['unmatched_gh'];
                                                $accnoe = $row['account_number'];
                                                $baknae = $row['bank_name'];
                                                $umatchph = $row['cabal_amt'];
                                                if($umatchph == ""){
                                                    $umatchph = "0";
                                                } else {
                                                    $umatchph = "$umatchph";
                                                }
                                                $umatchph = number_format($umatchph);
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
              
                        
                        Account name: <?php echo $funame; ?> <br>
                        Account number: <?php echo $accnoe; ?> <br>
                        Bank: <?php echo $baknae; ?> <br>
                        Phone number: <?php echo $poknae; ?><br>
                        Amount: <?php echo $renzie; ?><?php echo $umatchph; ?><br>
                        <?php 
                        if($cablast == "" || $cablast == 0){
                            $cab_tiviq = "No PH yet";
                        } else {
                            $cab_tiviq = "$cab_time ago";
                        }
                        ?>
                        Last PH: <?php echo $cab_tiviq; ?> <br>
                        
<script>
$(document).ready(function() {
    $('#deqoe<?php echo $id; ?>').click(function() {
    document.getElementById("reveref").innerHTML="<?php echo $followe; ?>";  
    document.getElementById("rerefdisp").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var rejid = "<?php echo $followe; ?>";
    $.post('matt_disp.php?amvo=<?php echo $zazezu; ?>&&pavo=<?php echo $followe; ?>',{rejid: rejid},function(data) {
        $("#rerefdisp").html(data);
    });
});
});
</script>                                 
                        <a id="deqoe<?php echo $id; ?>" title="Re-assign" class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".reassigncabz"><i class="fa fa-user"></i> Re-assign</a><br>                                      
                        
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
?>