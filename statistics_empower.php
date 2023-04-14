<?php
//////////ADD INTEREST
$get_terest = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$roltrest = $get_terest->fetch_assoc();
$gmatchstat = $roltrest['gethelp_match'];
$cdax = $roltrest['current_day'];
$ewallex = $roltrest['e_wallet'];
if($ewallex == ""){
    $ewallex = 0;
} else {
    $ewallex = "$ewallex";
}
$nucico = $roltrest['emp_cycle'];
$cdepeex = $roltrest['current_deposit'];
$emptrest = $roltrest['emp_interest'];
if($emptrest == ""){
    $emptrest = 0;
} else {
    $emptrest = "$emptrest";
}
$mewithdrax = $roltrest['my_withdraw'];
if($mewithdrax == ""){
    $mewithdrax = 0;
} else {
    $mewithdrax = "$mewithdrax";
}
$meearn = $roltrest['my_earnings'];
if($meearn == ""){
    $meearn = 0;
} else {
    $meearn = "$meearn";
}

$ewallxxo = number_format($ewallex);
$mewithdrax = number_format($mewithdrax);
$meearn = number_format($meearn);

///// GET CURRENCY                                                 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];

$get_rencee = $db->query("SELECT * FROM currency WHERE country='$sparconnn'");
$rorence = $get_rencee->fetch_assoc();
$renzie = $rorence['code'];                                                       
///// END GET CURRENCY    
?>

<!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Wallet</span>
                            <div class="count"><?php echo "$renzie$ewallxxo"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Balance </i></span>
                        </div>
                    </div>
                                        
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Earnings</span>
                            <div class="count green"><?php echo "$renzie$meearn"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Inflows </i></span>
                        </div>
                    </div>
                    
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Withdrawals</span>
                            <div class="count"><?php echo "$renzie$mewithdrax"; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Outflows </i></span>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->