<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<div class="friend-list"> 
<?php 
$amvo = $_GET['amvo'];
$amvo = $db->real_escape_string($amvo); 
$amvo = str_replace("'","&apos;", $amvo);

if($amvo == ""){
    $amvo = 0;
} else {
    $amvo = "$amvo";
}
$pavo = $_GET['pavo'];
$pavo = $db->real_escape_string($pavo); 
$pavo = str_replace("'","&apos;", $pavo);

$amvae = number_format($amvo);
$amvae = $db->real_escape_string($amvae); 
$amvae = str_replace("'","&apos;", $amvae);

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
                                                $uphis = $row['unmatched_gh'];
                                                if($uphis == ""){
                                                    $uphis = 0;
                                                } else {
                                                    $uphis = "$uphis";
                                                }
                                                if($uphis > $amvo){
                                                $dephor = $uphis - $amvo;
                                                } else {
                                                $dephor = $amvo - $uphis;    
                                                }
                                                $dephor = number_format($dephor);
                                                $umatchgh = $row['unmatched_gh'];
                                                if($umatchgh == ""){
                                                    $umatchgh = "0";
                                                } else {
                                                    $umatchgh = "$umatchgh";
                                                }
                                                $umatchgh = number_format($umatchgh);
                                                
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
                        GH amount: <?php echo $renzie; ?><?php echo $umatchgh; ?><br>
                        Payer: @<a href="./<?php echo $pavo; ?>" ><?php echo $pavo; ?></a><br>
                        PH provided: <?php echo "$renzie$amvae"; ?><br>
                        Difference: <?php echo "$renzie$dephor"; ?>
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
}
?>
</div>