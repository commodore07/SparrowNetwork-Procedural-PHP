
<?php 
$uni = "";
$gra_totaa = 0;
 $follo = "$tandee";
$totalxz = 0;   
////////////
if ($user != "") {
?>
<div id="imaxezokaq" class="imaxezokaq">  
<?php
$getmed = $db->query("SELECT * FROM my_expenses WHERE cashier = '$uzeev' AND tran_date='$follo' ORDER BY id DESC") or die($db->error());
$infoc = $getmed->num_rows;

$total_eev = $db->query("SELECT * FROM my_expenses WHERE cashier = '$uzeev' AND tran_date='$follo' ORDER BY id DESC LIMIT 10") or die($db->error());
$total_eax = $total_eev->num_rows;
include("while_exp.php");
?>
</div>    
TOTAL: <a class="text-green"><?php echo "$uni$gra_totaa"; ?></a>
<?php
}
?>

                <script>
                $(document).ready(function(){
                    $('.procink').hide();
                    var loadkiv = 0;
                    var nbrclick = "<?php echo $infoc; ?>";
                    $("#redova").on("click", function () {
                         $('.procink').show();
                         $('#redova').hide();
                         loadkiv++;
                         if (loadkiv * 10 > nbrclick){
                             $('.mexana').text("No more result to display");
                             $('.procink').hide();
                             $('#redova').hide();
                         }
                         else{
                         $.post("ajaxexprezcash.php?TD=<?php echo $tandee; ?>&UXV=<?php echo $uzeev; ?>",{load:loadkiv},function(data){
                           $('.imaxezokaq').append(data);
                           $('.procink').hide();
                           $('#redova').show();
                         });
                     }
                     
                    });
                });
                
                </script>
                
<?php 
if($infoc != 0){
if($infoc > 10){    
?>                
<center>
<div>
    <button id="redova" class="btn btn-primary">See more</button>
</div>
                                                
<div class="procink">
    <img src="loader2.gif">
</div>
<div class="mexana" style=";font-size: 16px; color: #999;">
                                                    
</div>
</center>
<?php 
}
} else{
?> 
                <center><i style="font-size: 150px; color: #999;" class="fa fa-money"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No expenses found for <?php echo $tandee; ?></div></center>
<?php 
}
?>                            



