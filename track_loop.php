<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$uname = $row['seller'];
                                                $realid = $row['real_id'];
						$name = $row['name'];
						$price = $row['price_tag'];
                                                $price = number_format($price);
						$item_pics = $row['accpic'];
                                                $lecashie = $row['le_cashier'];
                                                $phono = $row['phone_no'];
                                                $qteey = $row['item_qty'];
                                                if($qteey == ""){
                                                    $qteey = "0";
                                                }
                                                else {
                                                    $qteey = "$qteey";
                                                }
                                                
                                                $idee = $db->query("SELECT * FROM users WHERE username='$uname'") or die($db->error());
                                                $row = $idee->fetch_assoc();
						$vac1 = $row['vac1'];
                                                $vac2 = $row['vac3'];
                                                
$getinfoz = $db->query("SELECT * FROM users WHERE username='$lecashie'" ) or die($db->error());
$roz = $getinfoz->fetch_assoc();
    
                                                $fulname = $roz['fullname'];
                                                $phone = $roz['phone'];
                                                if($phone == ""){
                                                    $phone = "Secret";
                                                }
                                                else {
                                                    $phone = "$phone";
                                                }
                                                $profilepic = $roz['profilecrop_pic'];
                                                if ($profilepic == "") {
                                                 $profilepic = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic = "$profilepic";
                                                }
    
?>
	  



<!-- Tradefair Items
            ================================================= -->
           <div class="grid-item col-md-6 col-sm-6">
            	  <div class="media-grid">
                      <div class="img-wrapper">
                      <img src="<?php echo $item_pics; ?>" alt="" class="img-responsive post-image" />
                    </div>
                    <div class="media-info">
                      
                      <div class="user-info">
                        <img src="<?php echo $profilepic; ?>" alt="" class="profile-photo-sm pull-left" />
                        

                        <button id="gosell<?php echo $id; ?>" data-toggle="modal" data-target=".mesellit" class="btn btn-primary pull-right"><i class="fa fa-search-plus"></i> View</button> 
<script>
$(document).ready(function() {
    $('#gosell<?php echo $id; ?>').click(function() {
    document.getElementById("sellrel").innerHTML = "<center><img src='./loader2.gif'></center>";        
    document.getElementById("ddatit").innerHTML="<?php echo $realid; ?>";     
    document.getElementById("ddaqty").innerHTML="<?php echo $qteey; ?>"; 
    document.getElementById("ddid").innerHTML="<?php echo $id; ?>";
    var follo = "<?php echo $id; ?>";
    $.post('trackthatran.php',{follo: follo},function(data) {
        $("#sellrel").html(data);
    });
});
});
</script>  
                             
                        <div class="user">
                          <h6><a href="<?php echo $lecashie; ?>" class="profile-link"><?php echo $lecashie; ?></a></h6>
                          <div class="text-green"><?php echo "$vac2$price"; ?></div>
                          <div class="pull-right">Qty: <?php echo $qteey; ?> Phone: <?php echo "$phono"; ?></div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            	</div>
                                    
                                    
<?php
}
?>