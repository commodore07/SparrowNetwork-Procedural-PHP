<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php include("ago.php"); ?> 
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
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
              <div style="margin-bottom: 10px;" class="row">
                <div class="col-md-12">

                  <!-- Contact List in Left-->
                  <ul id="images" class="nav nav-tabs contact-list">
                      
<?php 
$getmag = $db->query("SELECT * FROM notify WHERE username='$user' AND emp1!='$user' AND event_id != '' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getinftee = $db->query("SELECT * FROM notify WHERE username='$user' AND emp1!='$user' AND event_id != '' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("delli_loop.php");
?>                                
                    
                  </ul><!--Contact List in Left End-->

                </div>
               
                <div class="clearfix"></div>
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
                             $('.messages').text("No more notification to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajax_notevi.php",{load:loadclick},function(data){
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-bell-o"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No notification yet...</div></center>
<?php 
}
?>            
     
            </div>
            
            
        </div>

    			<!-- Newsfeed Common Side Bar Right
          ================================================= -->
    	  <?php include("tradelist.php"); ?>
    		</div>
    	</div>
    </div>
<!--Popup-->
                    <div class="modal fade givite" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <div style="color: #999; text-align: center;">Group page invitation</div>
                            </div>
                            <div class="post-container">    
                                <div id="addsez"></div>
                                <textarea style="display: none;" id="ladid_nox"></textarea>
                                  <textarea style="display: none;" id="ladded_nox"></textarea> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->
    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>

  </body>


</html>
