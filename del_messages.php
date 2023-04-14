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
              <div  class="row" style="margin-bottom: 10px;">
                <div class="col-md-12">

                  <!-- Contact List in Left-->
                  <ul id="images" class="nav nav-tabs contact-list">
<?php 
$getmag = $db->query("SELECT * FROM my_chat WHERE sender = '$user' OR receiver= '$user' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$get_vazz = $db->query("SELECT * FROM my_chat WHERE sender = '$user' OR receiver= '$user' ORDER BY id DESC LIMIT 10");
$cvazz = $get_vazz->num_rows;
include("message_loop.php");
?>                    
                  </ul><!--Contact List in Left End-->

                </div>
                  
                  <?php include("chatter.php"); ?>
                
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
                             $('.messages').text("No more message to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajax_message.php",{load:loadclick},function(data){
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-envelope-o"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No message yet...</div></center>
<?php 
}
?>                  
                
            </div>
          </div>

    			<!-- Newsfeed Common Side Bar Right
          ================================================= -->
                        <div id="spartox"></div>              
    	  <?php include("tradelist.php"); ?>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>

  </body>


</html>
