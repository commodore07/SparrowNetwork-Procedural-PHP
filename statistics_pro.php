<?php
//// Total Users
$total_user = $db->query("SELECT * FROM invite WHERE follower= '$username'") or die($db->error());
$total_user_c = $total_user->num_rows;
/// Close query

///// Total Chirps
$gend_male = $db->query("SELECT * FROM posts WHERE user_posted_to='$username'") or die($db->error());
$gend_male_c = $gend_male->num_rows;
$gend_male_c = number_format($gend_male_c);
////// Close query

///// Daily Page Views
$dateda = date("Y-m-d");
$datenow = date("l, d F Y"); 
$acovich = $db->query("SELECT * FROM viewz_pro WHERE username='$username' AND log_date='$datenow'") or die($db->error());
$acovich_c = $acovich->num_rows;
////// Close query

?>

<!-- top tiles -->
                <div class="row tile_count">
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Total Members</span>
                            <div class="count"><?php echo $total_user_c; ?></div>
                            <span class="count_bottom"><i class="green">100% </i> of community</span>
                        </div>
                    </div>
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-comment-o"></i> Total Chirps</span>
                            <div class="count green"><?php echo $gend_male_c ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>
                    
                    
                    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
                        <div class="left"></div>
                        <div class="right">
                            <span class="count_top"><i class="fa fa-user"></i> Pageviews for today</span>
                            <div class="count"><?php echo $acovich_c; ?></div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>Sparrow Network </i></span>
                        </div>
                    </div>

                </div>
                <!-- /top tiles -->