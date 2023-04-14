<?php 
while ($row = $total_eev->fetch_assoc()) {
$my_exp = $row['my_exp'];
$exp_amtert = $row['exp_amt'];
$exp_amt = number_format($exp_amtert);
$unka = $row['username'];
$cashka = $row['cashier'];
$exact_time = $row['exact_time'];

$getinfteef = $db->query("SELECT * FROM users WHERE username='$cashka'" ) or die($db->error());
while ($roz = $getinfteef->fetch_assoc()) {
    $uni = $roz['vac3'];
    $feenaz = $roz['fullname'];
    $provee = $roz['profilecrop_pic'];
                                                if ($provee == "") {
                                                 $provee = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $provee = "$provee";
                                                }
} 
?>
              <img src="<?php echo $provee; ?>" alt="user" class="profile-photo-md pull-left" />
               <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="<?php echo $unka; ?>" class="profile-link"><?php echo $feenaz; ?></a> <span class="following"><i class="fa fa-money"></i> <?php echo "$uni$exp_amt"; ?></span></h5>
                    <p class="text-muted"> <?php echo $my_exp; ?> <span class="following"><i class="fa fa-clock-o"></i> <?php echo "$exact_time"; ?></span></p>
                    
                  </div>
               </div><hr>
<?php 
}
?>