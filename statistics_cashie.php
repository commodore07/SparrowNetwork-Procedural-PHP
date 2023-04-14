<?php
///// NULL VALUES 
$gr_total = 0;
$gr_total2 = 0;
$gr_total3 = 0;

$getinfio = $db->query("SELECT * FROM users WHERE username='$username'" ) or die($db->error());
while ($roz = $getinfio->fetch_assoc()) {
    $unio = $roz['vac3'];
} 
//// Total Users
$dateeva = "$tandee";

$totalxz2 = 0;    
$total_eev2 = $db->query("SELECT * FROM my_customers WHERE le_cashier = '$uzeev' AND search_date='$dateeva'") or die($db->error());
$total_eax2 = $total_eev2->num_rows;
while ($row = $total_eev2->fetch_assoc()) {
$pitag = $row['price_tag'];
$itmty = $row['item_qty'];

$exp_amtert2 = $pitag * $itmty;
/////////////// TOTAL AMOUNT
////////////////
$pzeeex2 = array ($exp_amtert2);
$valuux2 = array_sum ($pzeeex2);
$totalxz2 +=$valuux2;
$gr_total2 = "$totalxz2";
}
$total_salez = number_format($gr_total2);

/// Close query

//// Total Expenses
$totalxz = 0;    
$total_eev = $db->query("SELECT * FROM my_expenses WHERE cashier = '$uzeev' AND tran_date='$dateeva'") or die($db->error());
$total_eax = $total_eev->num_rows;
while ($row = $total_eev->fetch_assoc()) {
$my_exp = $row['my_exp'];
$exp_amtert = $row['exp_amt'];
$exp_amt = number_format($exp_amtert);
$unka = $row['username'];

/////////////// TOTAL AMOUNT
////////////////
$pzeeex = array ($exp_amtert);
$valuux = array_sum ($pzeeex);
$totalxz +=$valuux;
$gr_total = "$totalxz";
}
$total_daiexp = number_format($gr_total);
////////////////////////
/// Close query

////// Cash in drawer
$cashdr = $gr_total2 - $gr_total;
$cashdraw = number_format($cashdr);
///// End cash in drawer

///// Total Chirps
$gend_male = $db->query("SELECT * FROM tradefair WHERE username='$uzeev'") or die($db->error());
$gend_male_c = $gend_male->num_rows;
$gend_male_c = number_format($gend_male_c);
////// Close query

///// Total cost price
$totalxz3 = 0;    
$total_eev3 = $db->query("SELECT * FROM my_customers WHERE le_cashier = '$uzeev' AND search_date='$dateeva'") or die($db->error());
$total_eax3 = $total_eev3->num_rows;
while ($row = $total_eev3->fetch_assoc()) {
$pitag3 = $row['costprice'];
if($pitag3 == ""){
    $pitag3 = 0;
} else {
    $pitag3 = "$pitag3";
}
$itmty3 = $row['item_qty'];

$exp_amtert3 = $pitag3 * $itmty3;
/////////////// TOTAL AMOUNT
////////////////
$pzeeex3 = array ($exp_amtert3);
$valuux3 = array_sum ($pzeeex3);
$totalxz3 +=$valuux3;
$gr_total3 = "$totalxz3";
}
$total_costez = number_format($gr_total3);
////// Close query

////// Profit for the day
$profitdr = $gr_total2 - $gr_total3;
$profitmade = number_format($profitdr);
///// End cash in drawer

////// Gross profit for the day
$grofitdr = $profitdr - $gr_total;
$grofitmade = number_format($grofitdr);
///// End cash in drawer

?>

<!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Total sales for today</span>
                            <div class="count"><?php echo "$unio$total_salez"; ?></div>
                         
                        </div>
                    </div>
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> <a id="getexp" style="cursor: pointer;" data-toggle="modal" data-target=".explist">Total expenses</a></span>
                            <div class="count green"><?php echo "$unio$total_daiexp"; ?></div>
                         
                        </div>
                    </div>                    
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Cash in drawer</span>
                            <div class="count"><?php echo "$unio$cashdraw"; ?></div>
                          
                        </div>
                    </div>
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Profit for the day</span>
                            <div class="count"><?php echo "$unio$profitmade"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Gross profit</span>
                            <div class="count"><?php echo "$unio$grofitmade"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Total cost price</span>
                            <div class="count"><?php echo "$unio$total_costez"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
                
                <!--Popup-->
                    <div class="modal fade explist" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Total expenses for <?php echo $dateeva; ?></div>
                            </div>
                            <div class="post-container">
                               <?php include("myexpcashie.php"); ?> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
                    
                    <!--Popup-->
                    <div class="modal fade serva" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Services rendered on <?php echo $dateeva; ?></div>
                            </div>
                            <div class="post-container">
                               <?php include("mysecashie.php"); ?> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->    