<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php include("ago.php"); ?> 
<?php 
$post = strip_tags($_POST['uzee']);
$post = $db->real_escape_string($post);
$post = str_replace("'", "&apos;", $post);
$tino = time();
if ($post != "") {
/////////// Search Query Begins
$totalxz2 = 0;      
$getinftee = $db->query("SELECT * FROM view_cart WHERE cashier = '$user' ORDER BY id DESC" ) or die($db->error());
$countaee = $getinftee->num_rows;
if($countaee > 0){
while ($roz = $getinftee->fetch_assoc()) {
    
                                                $prodnom = $roz['p_name'];
                                                $ptagee = $roz['price_tag'];
                                                $ptag = number_format($ptagee);
                                                $seller = $roz['seller'];
                                                $prof_pic = $roz['accpic'];
                                                $itemqty = $roz['item_qty'];
                                                $timesent = $roz['time_sent'];
                                                $ago_tizz = time_ago($timesent);
                                                
                                                $idee = $db->query("SELECT * FROM users WHERE username='$seller'") or die($db->error());
                                                $row = $idee->fetch_assoc();
						$vac1 = $row['vac1'];
                                                $vac2 = $row['vac3'];
$exp_amtert2 = $ptagee * $itemqty;
$exp_amtertcaa = number_format($exp_amtert2);
/////////////// TOTAL AMOUNT
////////////////
$pzeeex2 = array ($exp_amtert2);
$valuux2 = array_sum ($pzeeex2);
$totalxz2 +=$valuux2;
$gr_total2 = "$totalxz2";                                                
                                                   
?> 
              <img src="<?php echo $prof_pic; ?>" alt="user" class="profile-photo-md pull-left" />
              <div class="post-detail">
                  <div class="user-info">
                    <h5><?php echo $prodnom; ?> <span class="following"><?php echo $ago_tizz; ?> ago</span></h5>
                    <p class="text-muted"><?php echo "$vac2$ptag"; ?> <span class="following">Qty: <?php echo $itemqty; ?></span></p>
                    <p class="text-muted">Total cost for Qty: <?php echo $itemqty; ?> <span class="following"><?php echo "$vac2$exp_amtertcaa"; ?></span></p>
                  </div>
              </div>
              <div class="line-divider"></div>
              
<?php 
}
$total_salez = number_format($gr_total2);
?>
              <div class="profile-photo-md pull-left">Total:</div>
              <div class="post-detail">
                  <div class="user-info">
                    <span class="text-green"><?php echo "$vac2$total_salez"; ?></span>
                  </div>
              </div>
              <div class="line-divider"></div>         
<?php
} else {
?>
                <center><i style="font-size: 150px; color: #999;" class="fa fa-shopping-cart"></i></center>  
                <center><div style="font-size: 14px; color: #999;">Cart is empty...</div></center>             
<?php
}
}
?>
