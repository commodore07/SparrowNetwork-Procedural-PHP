<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <?php include("onload_code.php"); ?>
    
    <?php include("countdown_func.php"); ?> 
<link href="css/custom.css" rel="stylesheet">    
<?php include("ago.php"); ?>     
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div class="timeline">
       <?php include("cover.php"); ?> 
        <div id="page-contents">
          <div class="row">
            <?php include ("sider3.php"); ?>
            <div class="col-md-7">

              <!-- Basic Information
              ================================================= -->
              <div class="edit-profile-container">
                <div class="block-title">
                    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>
                        GH pool 
                    </h4>
                    
                    <?php include ("referral_code.php"); ?>
                  <div class="line"></div>
                  
                </div>
                <div class="edit-block">
                    
                  
      
<!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                    
<div id="images" class="images">  
<?php 
$get_empzza = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
?>      
    
<?php 
$i = "";	  								  
$sql_follow = "SELECT * FROM follows WHERE follower='$user'";								  
$getfolls = $db->query($sql_follow);
$ccco = $getfolls->num_rows;
if($ccco == 0){
    $follzie[] = "0";
}
else {
while($arr = $getfolls->fetch_array()) {
    $follzie[] = $arr['followe'];   
}
}

$query_follow = "SELECT * FROM ponzee WHERE";

foreach ($follzie as $each){
    $i++;
    //echo $i.'<p>&nbsp;</p>';

    if ($i == 1)
    {
        $query_follow .= " username = '$each' && unmatched_gh !='' && unmatched_gh != '0' && spar_coun='$sparconnn'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR username = '$each' && unmatched_gh !='' && unmatched_gh != '0' && spar_coun='$sparconnn'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);
$getmag = $db->query("$query_follow ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;
$getposts = $db->query("$query_follow ORDER BY id DESC LIMIT 10") or die($db->error());
include ("while_ghpool.php");
?>
  
</div>

                <script>
                
                $(document).ready(function(){
                    $('.procin').hide();
                    var loadclick = 0;
                    var nbrclick = "<?php echo $info; ?>";
                    $("#readmore").on("click", function () {
                         $('.procin').show();
                         $('#readmore').hide();
                         loadclick++;
                         if (loadclick * 10 > nbrclick){
                             $('.messages').text("No more result to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajax_ghpool.php",{load:loadclick},function(data){
                           $('.images').append(data);
                           $('.procin').hide();
                           $('#readmore').show();
                         });
                     }
                     
                    });
                });
                
                </script>
                            		
            	</div>
<?php 
if($info != 0){
if($info > 10){    
?>                
<center>
<div>
    <button id="readmore" class="btn btn-primary">See more</button>
</div>
                                                
<div class="procin">
    <img src="loader2.gif">
</div>
<div class="messages" style=";font-size: 16px; color: #999;">
                                                    
</div>
</center>
<?php 
}
} else{
?> 
                <center><i style="font-size: 150px; color: #999;" class="fa fa-group"></i></center>  
                <center><div style="font-size: 14px; color: #999;">Empty</div></center>
<?php 
}
?>                     
            </div>     
                  
                </div>
              </div>
            </div>
           <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

                    

<?php include("mycashflowpop.php"); ?>

    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("ponzeepic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
