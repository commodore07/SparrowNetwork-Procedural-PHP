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
$long_date = $row['long_date'];
$la_amount = $row['la_amount'];
$la_amount = number_format($la_amount);
$describe_it = $row['describe_it'];
$bal_aftran = $row['bal_aftran'];
if($bal_aftran == ""){
    $bal_aftran = 0;
} else {
    $bal_aftran = "$bal_aftran";
}
$bal_aftran = number_format($bal_aftran);
$latime = $row['latime'];
$short_date = $row['short_date'];
$bal_btran = $row['bal_btran'];
if($bal_btran == ""){
    $bal_btran = 0;
} else {
    $bal_btran = "$bal_btran";
}
$bal_btran = number_format($bal_btran);

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
                          <h4 class="panel-title"><span class="ing"><?php echo $short_date; ?> <i class="fa fa-money"></i> <?php echo $describe_it; ?> <span class="pull-right"><?php echo "$renzie$la_amount"; ?></span></span></h4>
                    </div>
                    <div id="togit<?php echo $id; ?>" class="panel-collapse collapse">
                        <div  class="panel-body">
                        <h5><span class="label label-primary"><?php echo $describe_it; ?></span></h5>
                        <p><?php echo $long_date; ?></p>
                        <p>Balance before transaction: <?php echo "$renzie$bal_btran"; ?></p>
                        <p>Balance after transaction: <?php echo "$renzie$bal_aftran"; ?></p>
                      </div>
                    </div>
                  </div><!-- .panel -->
                  
                </div><!-- .panel-group -->
<?php 
}
?>