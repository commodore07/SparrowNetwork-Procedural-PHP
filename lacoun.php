<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <?php 
if($user == "admin"){

} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";
	exit();
}
?>    
    
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
                <div class="faq-headline">
                	<h3 class="item-title grey">Active countries</h3>
                	
                </div>
            <!-- Post Create Box
            ================================================= -->
            

            <!-- Chat Room
            ================================================= -->
            
 <div class="chat-room">
              <div  class="row">
                <div class="col-md-12">

                  <!-- Contact List in Left-->
                  <ul id="images" style="margin-bottom: 10px;" class="nav nav-tabs contact-list">
                      
<?php    
$getmag = $db->query("SELECT * FROM ponzee WHERE spar_coun != '' AND coun_stat != '' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getinfteef = $db->query("SELECT * FROM ponzee WHERE spar_coun != '' AND coun_stat != '' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("coun_loop.php");
?>                                
                    
                  </ul><!--Contact List in Left End-->
                  
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
                         $.post("ajax_coun.php",{load:loadclick},function(data){
                           $('#images').append(data);
                           $('.procin').hide();
                           $('#readmore').show();
                         });
                     }
                     
                    });
                });
                
                </script>

                
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-globe"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No country yet...</div></center>
<?php 
}
?>                      

                </div>
               
                <div class="clearfix"></div>
              </div>
            </div>
            
            
        </div>
           <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

                    

<?php include("mycashflowpop.php"); ?>
<?php include("chatter.php"); ?>
   
    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
    <?php include("coun_edit.php"); ?>  
    <?php include("ponzeepic_change.php"); ?>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/edit-profile-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Dec 2017 23:11:48 GMT -->
</html>
