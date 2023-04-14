<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
$follo = strip_tags(@$_POST['follo']);
$follo = $db->real_escape_string($follo); 
 $follo = str_replace("'", "&apos;", $follo);

if ($user != "") {
//// GET PRICE
$get_prixe = $db->query("SELECT * FROM tradefair WHERE id='$follo'");
$rollex = $get_prixe->fetch_assoc();
$pixxe = $rollex['price'];
$pixxe = number_format($pixxe);
$nixxe = $rollex['name'];
$quantee = $rollex['item_qty'];
if($quantee == ""){
    $quantee = 0;
}
else {
    $quantee = "$quantee";
}
$accpic = $rollex['actual_pic'];
$uzename = $rollex['username'];
$detailll = $rollex['describeit'];
//// END GET PRICE   
                                                $get_user_info = $db->query("SELECT * FROM users WHERE username='$uzename'");
                                                $get_info = $get_user_info->fetch_assoc();
                                                $propixa = $get_info['profilecrop_pic'];
                                                $fleexa = $get_info['fullname'];
                                                $vac2 = $get_info['vac3'];
                                                $scantopay = $get_info['scantopay'];
                                                if ($propixa == "") {
                                                 $propixa = "./img/default_pic.jpg";
                                                }
                                                else
                                                {
                                                 $propixa = "$propixa";
                                                }
?>
                <div class="post-container">
                <img src="<?php echo "$propixa"; ?>" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                      <h5><a href="<?php echo $uzename; ?>" class="profile-link"><?php echo $fleexa; ?></a> <span class="following">@<a href="<?php echo $uzename; ?>"><?php echo $uzename; ?></a></span></h5>
                      <p class="text-muted">Product name: <?php echo $nixxe; ?></p>
                    <p class="text-muted">Description: <i class="fa fa-pagelines text-green"></i> <?php echo $detailll; ?></p>
                  </div>
                  <div class="reaction">
                    <a class="btn text-green"><i class="fa fa-money"></i> <?php echo "$vac2$pixxe"; ?></a>
                    <a class="btn text-red">Qty: <?php echo "$quantee"; ?></a>
                  </div>
                  <div class="line-divider"></div>
                  <img style="max-width: 100%; margin-bottom: 10px;" src="<?php echo $accpic; ?>" alt="Tradefair pic" class="img-rounded" /> 
                  
                  <?php 
                  if($scantopay != ""){
                  ?>
                  <center>
                  <img style="max-width: 100%; margin-bottom: 10px;" src="<?php echo $scantopay; ?>" alt="Zenith scan to pay" class="img-rounded" />
                  </center>
                  <?php
                  }
                  ?>
                  
                </div>
              </div>
<?php 
}
?>



