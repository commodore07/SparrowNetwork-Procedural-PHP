<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<div class="friend-list"> 
<?php 
$post = strip_tags($_POST['rejid']);
$post = $db->real_escape_string($post); 
$post = str_replace("'", "&apos;", $post);
$tino = time();
if ($post != "") {
/////////// Search Query Begins

$getposts = $db->query("SELECT * FROM ponzee WHERE username='$post'" ) or die($db->error());
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$followe = $row['username'];
                                                $accnoe = $row['account_number'];
                                                $baknae = $row['bank_name'];
                                                $umatchph = $row['unmatched_ph'];
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
                      
                      	<h5><a href="./<?php echo $usename; ?>" class="profile-link"><?php echo $funame; ?></a></h5>
                        <p>@<a href="<?php echo $usename; ?>"><?php echo $usename; ?></a></p>
                              
                        Account name: <?php echo $funame; ?> <br>
                        Account number: <?php echo $accnoe; ?> <br>
                        Bank: <?php echo $baknae; ?> <br>
                        Phone number: <?php echo $poknae; ?><br>
                        Amount: <?php echo $renzie; ?><?php echo $umatchph; ?>
                        
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
}
?>
</div>