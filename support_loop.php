<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
///// GET CURRENCY CODE
$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code']; 

while ($row = $getposts->fetch_assoc()) {
$id = $row['id'];    
$e_wallet = $row['e_wallet'];
if($e_wallet == ""){
    $e_wallet = 0;
} else {
    $e_wallet = "$e_wallet";
}
$e_wallet = number_format($e_wallet);
$unamex = $row['username']; 

$get_usk = $db->query("SELECT * FROM users WHERE username='$unamex'");
$rousk = $get_usk->fetch_assoc();
$fulnam = $rousk['fullname']; 
$propixa = $rousk['profilecrop_pic'];
if($propixa == ""){
    $propixa = "./img/default_pic2.jpg";
}
else {
    $propixa = "$propixa";
}

?>

<script language="javascript">
         function metoggle<?php echo $id; ?>() {
           var ele = document.getElementById("togit<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = 'none';
           }
           else
           {
             ele.style.display = 'block';
           }
         }
</script>        

              <div style="cursor: pointer;" onclick="metoggle<?php echo $id; ?>()" class="panel-group" id="faqAccordion-1">
                  <div class="panel panel-default ">
                      <div  class="panel-heading">
                          <h4 class="panel-title"><span class="ing">@<?php echo $unamex; ?> <?php echo $fulnam; ?> <span class="pull-right"><?php echo "$renzie$e_wallet"; ?></span></span></h4>
                    </div>
                    <div id="togit<?php echo $id; ?>" class="panel-collapse collapse">
                        <div  class="panel-body">
                        
                            <div class="post-detail">
                    <img style="margin-right: 10px;" src="<?php echo $propixa; ?>" alt="user" class="profile-photo-sm pull-left" />
                  <div class="user-info">
                      <h5><a href="./<?php echo $unamex; ?>" class="profile-link"><?php echo $fulnam; ?></a> <span class="following">@<a class="text-green" href="./<?php echo $unamex; ?>"><?php echo $unamex; ?></a></span></h5>
                    <p class="text-green">Wallet: <?php echo "$renzie$e_wallet"; ?></p>
                  </div>
                  
                </div>
                            
                      </div>
                    </div>
                  </div><!-- .panel -->
                  
                </div><!-- .panel-group -->
<?php 
}
?>