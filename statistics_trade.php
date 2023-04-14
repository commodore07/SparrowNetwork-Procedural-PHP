<?php
//// Total Users
$dateeva = date('d/m/Y');
$total_user = $db->query("SELECT * FROM my_customers WHERE seller = '$username' AND search_date='$dateeva'") or die($db->error());
$total_user_c = $total_user->num_rows;
$total_user_c = number_format($total_user_c);
/// Close query

///// Total Chirps
$gend_male = $db->query("SELECT * FROM tradefair WHERE username='$username'") or die($db->error());
$gend_male_c = $gend_male->num_rows;
$gend_male_c = number_format($gend_male_c);
////// Close query

///// Daily Page Views
$dateda = date("Y-m-d");
$datenow = date('d/m/Y'); 
$acovich = $db->query("SELECT * FROM viewz_trade WHERE username='$username' AND log_date='$datenow'") or die($db->error());
$acovich_c = $acovich->num_rows;
$acovich_c = number_format($acovich_c);
////// Close query

?>

<!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-money"></i> Total Sales for today</span>
                            <div class="count"><?php echo $total_user_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> <span id="viewez" style="cursor: pointer;" data-toggle="modal" data-target=".dacartz" class="text-green">View cart</span><span id="meekaz"></span> </i></span>
                        </div>
                    </div>
                    
<?php include("my_cart.php"); ?>                    
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-globe"></i> Total Items</span>
                            <div class="count green"><?php echo $gend_male_c ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Items in store </i></span>
                        </div>
                    </div>
                    
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Pageviews for today</span>
                            <div class="count"><?php echo $acovich_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Daily visitors </i></span>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->