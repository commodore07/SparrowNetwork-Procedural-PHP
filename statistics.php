<?php
//// Total Users
$total_user = $db->query("SELECT * FROM users") or die($db->error());
$total_user_c = $total_user->num_rows;
$total_user_c = number_format($total_user_c);
/// Close query

///// Nigerian Users
$niger_user = $db->query("SELECT * FROM users WHERE country = 'Nigeria'") or die($db->error());
$niger_user_c = $niger_user->num_rows;
$niger_user_c = number_format($niger_user_c);
////// Close query

///// Total Males
$gend_male = $db->query("SELECT * FROM users WHERE gender = 'Male'") or die($db->error());
$gend_male_c = $gend_male->num_rows;
$gend_male_c = number_format($gend_male_c);
////// Close query

///// Active Users
$date_added = date("Y-m-d");
$activ_user = $db->query("SELECT * FROM users WHERE login_date = '$date_added'") or die($db->error());
$activ_user_c = $activ_user->num_rows;
$activ_user_c = number_format($activ_user_c);
////// Close query

///// Total Females
$gend_female = $db->query("SELECT * FROM users WHERE gender = 'Female'") or die($db->error());
$gend_female_c = $gend_female->num_rows;
$gend_female_c = number_format($gend_female_c);
////// Close query

/// open %
/// Nigerian Percentage
$n_per = $niger_user_c / $total_user_c;
$ni_per = $n_per * 100;
$ni_per = round($ni_per, 1);
/// end Nigerian Percentage

/// Active Percentage
$act_per = $activ_user_c / $total_user_c;
$actuo_per = $act_per * 100;
$actuo_per = round($actuo_per, 1);
/// end Male Percentage

/// Male Percentage
$man_per = $gend_male_c / $total_user_c;
$male_per = $man_per * 100;
$male_per = round($male_per, 1);
/// end Male Percentage

/// Female Percentage
$fan_per = $gend_female_c / $total_user_c;
$female_per = $fan_per * 100;
$female_per = round($female_per, 1);
/// end Male Percentage



/// close %

///// Daily Page Views
$dateda = date("l, d F Y"); 
$acovich = $db->query("SELECT * FROM viewz_total WHERE log_date = '$dateda'") or die($db->error());
$acovich_c = $acovich->num_rows;
$acovich_c = number_format($acovich_c);
////// Close query

?>

<!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                            <div class="count"><?php echo $total_user_c; ?></div>
                            <span class="count_bottom"><i class="green">100% </i> of community</span>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Nigerian Users</span>
                            <div class="count"><?php echo $niger_user_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?php echo $ni_per ?>% </i> of community</span>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                            <div class="count green"><?php echo $gend_male_c ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?php echo $male_per ?>% </i> of community</span>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                            <div class="count"><?php echo $gend_female_c; ?></div>
                            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i><?php echo $female_per; ?>% </i> of community</span>
                        </div>
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> <a id="getlogzers" data-toggle="modal" style="cursor: pointer;" data-target=".logers">Active users for today</a></span>
                            <div class="count"><?php echo $activ_user_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i><?php echo $actuo_per; ?>% </i> of community</span>
                        </div>
                        
<script>
$('#loadacx').hide();     
$(document).ready(function() {
    $('#getlogzers').click(function() {
    $('#loadacx').show();    
    var follo = "<?php echo $user; ?>";
    $.post('seelog.php',{follo: follo},function(data) {
        $("#seelogers").html(data);
        $('#loadacx').hide(); 
    });
});
});
</script>                           
                        
                    </div>
                    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Pageviews for today</span>
                            <div class="count"><?php echo $acovich_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->
                
                
<!--Popup-->
                    <div class="modal fade logers" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <div style="color: #999; text-align: center;">Active users for today</div>
                            </div>
                            <div class="post-container">    
                                <div id="seelogers"></div>
                                <center><div id="loadacx"><img src="./loader2.gif"></div></center> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->                