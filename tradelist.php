<div class="col-md-2 static visible-lg">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Sparrow Tradefair</h4>
<?php 
$unkzi = "on";
$getweez= $db->prepare("SELECT * FROM tradefair WHERE la_activ=? ORDER BY RAND() LIMIT 6" ) or die($db->error());
$getweez->bind_param("s", $unkzi);
$getweez->execute();
$getweez = $getweez->get_result();
while ($roz = $getweez->fetch_assoc()) {
    
                                                $nom = $roz['name'];
                                                $price = $roz['price'];
                                                $price = number_format($price);
                                                $pic = $roz['pic'];
                                                $unk = $roz['username'];
                                                $chas = $roz['chasis'];
                                                
$getinx = $db->prepare("SELECT * FROM users WHERE username=?") or die($db->error());
$getinx->bind_param("s", $unk);
$getinx->execute();
$getinfteef = $getinx->get_result();
$roz = $getinfteef->fetch_assoc();
$uni = $roz['vac3'];
     
?>              
              <div class="follow-user">
                  <img src="<?php echo $pic; ?>" alt="" width="50" style="margin-right: 10px;" class="img-rounded pull-left" />
                <div>
                  <h5><a href="./<?php echo $unk; ?>.trade"><?php echo $nom; ?></a></h5>
                  <a href="./<?php echo $unk; ?>.trade" class="text-green"><?php echo "$uni$price"; ?></a>
                </div>
              </div>
         
<?php 
}
?>

               </div>
          </div>