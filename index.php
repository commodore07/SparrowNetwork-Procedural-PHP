<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
    
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
                            
                            <div id="shadow" style="text-align: center;">         
                    <div class=" col-md-12">
                
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>

                    <!-- Title -->
<?php 
if($uppstax == "on"){
?>
                    <div>
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Maintenance in progress...
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      <img src="./css/emoji/construction.png">
                      <img src="./css/emoji/construction_worker.png">
                        </p></center>

                    <!-- Button -->
                    
                    </div>
<?php
} else {
?>
                    <div>
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      People Empowering People
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      Join an online community where people empower people. Empower someone today, and get empowered in 26 active days. Join us now...
                        </p></center>

                    <!-- Button -->
                    <a style="margin-bottom: 20px" href="login.php" class="btn btn-primary">
                      Login
                    </a>
                    <a style="margin-bottom: 20px" href="register.php" class="btn btn-primary">
                      Register
                    </a>
                    </div>
<?php
}
?>                    
                  
                  </div>
                  </div>

<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM posts WHERE empty1='crimson' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM posts WHERE empty1='crimson' ORDER BY id DESC LIMIT 10" ) or die($db->error());
include("while_index.php");
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
                             $('.messages').text("No more chirp to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajax_index.php",{load:loadclick},function(data){
                           $('.images').append(data);
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

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    	  <?php include("tradelist.php"); ?>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
    <?php include("footer.php"); ?>
  </body>


</html>
