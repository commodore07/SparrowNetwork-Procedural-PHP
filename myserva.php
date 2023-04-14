
<?php 
$univer = "";
$gra_totaaver = 0;
 $follover = "$tandee";
$totalxzver = 0;   
////////////
if ($user != "") {
?>
<div id="imagesver" class="imagesver">  
<?php
$getmedver = $db->query("SELECT * FROM my_customers WHERE seller = '$user' AND search_date='$follover' AND le_status='services' ORDER BY id DESC") or die($db->error());
$infover = $getmedver->num_rows;
while ($row = $getmedver->fetch_assoc()) {
$exp_ampazzzz2 = $row['price_tag'];
/////////////// TOTAL AMOUNT
////////////////
$pzeexver = array ($exp_ampazzzz2);
$valuuxver = array_sum ($pzeexver);
$totalxzver +=$valuuxver;
$gr_totalver = "$totalxzver";
$gra_totaaver = number_format($gr_totalver);
////////////////////////
}

$totaleever = $db->query("SELECT * FROM my_customers WHERE seller = '$user' AND search_date='$follover' AND le_status='services' ORDER BY id DESC LIMIT 10") or die($db->error());
$totaleaxver = $totaleever->num_rows;
include("while_servey.php");
?>
</div>    
TOTAL: <a class="text-green"><?php echo "$univer$gra_totaaver"; ?></a>
<?php
}
?>

                <script>
                $(document).ready(function(){
                    $('.procinver').hide();
                    var loadkiver = 0;
                    var nbrcliver = "<?php echo $infover; ?>";
                    $("#rediver").on("click", function () {
                         $('.procinver').show();
                         $('#rediver').hide();
                         loadkiver++;
                         if (loadkiver * 10 > nbrcliver){
                             $('.medniver').text("No more result to display");
                             $('.procinver').hide();
                             $('#rediver').hide();
                         }
                         else{
                         $.post("ajaxservee.php?TD=<?php echo $tandee; ?>",{load:loadkiver},function(data){
                           $('.imagesver').append(data);
                           $('.procinver').hide();
                           $('#rediver').show();
                         });
                     }
                     
                    });
                });
                
                </script>
                
<?php 
if($infover != 0){
if($infover > 10){    
?>                
<center>
<div>
    <button id="rediver" class="btn btn-primary">See more</button>
</div>
                                                
<div class="procinver">
    <img src="loader2.gif">
</div>
<div class="medniver" style=";font-size: 16px; color: #999;">
                                                    
</div>
</center>
<?php 
}
} else{
?> 
                <center><i style="font-size: 150px; color: #999;" class="fa fa-money"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No service rendered on <?php echo $tandee; ?></div></center>
<?php 
}
?>                            



