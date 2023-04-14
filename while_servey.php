<?php 
while ($row = $totaleever->fetch_assoc()) {
$my_expzz = $row['laname'];
$exp_ampazzzz = $row['price_tag'];
$exp_ampazz = number_format($exp_ampazzzz);
$unkazz = $row['seller'];
$cashkazz = $row['le_cashier'];
$exact_time = $row['exact_time'];

$getinfteever = $db->query("SELECT * FROM users WHERE username='$cashkazz'" ) or die($db->error());
while ($roz = $getinfteever->fetch_assoc()) {
    $univer = $roz['vac3'];
    $feenaver = $roz['fullname'];
    $proveever = $roz['profilecrop_pic'];
                                                if ($proveever == "") {
                                                 $proveever = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $proveever = "$proveever";
                                                }
} 
?>
              <img src="<?php echo $proveever; ?>" alt="user" class="profile-photo-md pull-left" />
               <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="<?php echo $unkazz; ?>" class="profile-link"><?php echo $feenaver; ?></a> <span class="following"><i class="fa fa-money"></i> <?php echo "$univer$exp_ampazz"; ?></span></h5>
                    <p class="text-muted"> <?php echo $my_expzz; ?> <span class="following"><i class="fa fa-clock-o"></i> <?php echo "$exact_time"; ?></span></p>
                  </div>
               </div><hr>
<?php 
}
?>