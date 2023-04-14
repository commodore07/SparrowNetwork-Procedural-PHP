<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php include("ago.php"); ?> 

<?php 
$follo = strip_tags(@$_POST['follo']);
 $follo = $db->real_escape_string($follo); 

if ($user != "") {
//// GET PRICE
$get_prixe = $db->query("SELECT * FROM my_customers WHERE id='$follo'");
$row = $get_prixe->fetch_assoc();
$id = $row['id'];
						$uname = $row['seller'];	
						$name = $row['name'];
                                                $le_cashier = $row['le_cashier'];
                                                $cusphoto = $row['customer_photo'];
                                                if($cusphoto == ""){
                                                    $cusphoto = "./img/default_pic.jpg";
                                                } else {
                                                    $cusphoto = "$cusphoto";
                                                }
						$price = $row['price_tag'];
                                                $price = number_format($price);
                                                $proname = $row['laname'];
                                                $pro_id = $row['product_id'];
						$item_pics = $row['accpic']; 
                                                $exact_time = $row['exact_time'];
                                                $phono = $row['phone_no'];
                                                $date_added = $row['time_sent'];
                                                if($date_added != ""){
                                                $ago_time = time_ago($date_added);
                                                } else {
                                                    $ago_time = "";
                                                }
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
                                                
$getinfoz = $db->query("SELECT * FROM users WHERE username='$le_cashier'" ) or die($db->error());
$roz = $getinfoz->fetch_assoc();
    
                                                $fulname = $roz['fullname'];
                                                $phone = $roz['phone'];
                                                $counz = $roz['country'];
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
                       
                        <div class="pull-right"><i class="fa fa-clock-o"></i> <?php echo $ago_time; ?> ago</div>
                        
                        <div class="user">
                            <div>Customer name: <?php echo $name; ?></div>
                            <div class="pull-right">Product id: <?php echo $pro_id; ?></div> 
                            <div>Product name: <?php echo $proname; ?></div> 
                            
                            <div class="text-green">Price: <?php echo "$vac2$price"; ?></div>
                          <div class="pull-right">Qty: <?php echo $qteey; ?> Phone: <?php echo "$phono"; ?></div>
                        </div>
                        
                      </div>
                    </div>
                  </div><br>
               <img src="<?php echo $profilepic; ?>" alt="user" class="profile-photo-md pull-left" />
               <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="<?php echo $le_cashier; ?>" class="profile-link"><?php echo $fulname; ?></a> <span class="following">Cashier</span></h5>
                    <p class="text-muted"><i class="icon ion-ios-location"></i> <?php echo $counz; ?> <span class="following"><i class="fa fa-clock-o"></i> <?php echo "$exact_time"; ?></span></p>
                  </div>
               </div>
            	</div>
               
               <!-- Customer's pic
            ================================================= -->
           <div class="grid-item col-md-6 col-sm-6">
            	  <div class="media-grid">
                      <div class="img-wrapper">
                      <img src="<?php echo $cusphoto; ?>" alt="" class="img-rounded post-image" />
                    </div>
                    
                  </div>
            	</div>
<?php 
}
?>



