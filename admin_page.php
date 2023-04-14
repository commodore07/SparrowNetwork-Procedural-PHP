<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <link href="css/lacustom.css" rel="stylesheet">
<?php include("ago.php"); ?> 
    
<?php 
if($user == "admin" || $user == "support"){
    ///// DO NOTHING
} else {
echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";
	exit();
} 
?>        
    
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
            
            <div  class="row">
                <div class="col-md-12">
                    <?php include("statistics.php"); ?> 
                </div>
            </div>
            
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    	  <?php include("sider.php"); ?>		
    	<div class="col-md-7">

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
$getmag = $db->query("SELECT * FROM users ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getinfteef = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("admin_loop.php");
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
                         $.post("ajax_admin.php",{load:loadclick},function(data){
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
                <center><div style="font-size: 14px; color: #999;">No chirps yet...</div></center>
<?php 
}
?>                      

                </div>
               
                <div class="clearfix"></div>
              </div>
            </div>
            
            
        </div>

    			<!-- Newsfeed Common Side Bar Right
          ================================================= -->
    	  <?php include("tradelist.php"); ?>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>
  <?php include("admin_edit.php"); ?>     

  </body>


</html>
