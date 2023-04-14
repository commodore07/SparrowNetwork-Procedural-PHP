<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
<?php include("ago.php"); ?> 
<?php
$term = (!empty($_GET['term']) ? $_GET['term'] : null);
$term = $db->real_escape_string($term); 
$post = "$term";
?>       
  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div>
          
<?php 
$get_phot = $db->query("SELECT * FROM users WHERE username='$user'");
$rollin = $get_phot->fetch_assoc();
$fnee = $rollin['fullname'];
                                                $propix = $rollin['profile_pic'];
                                                $propix2 = $rollin['profilecrop_pic'];
                                                /// Profile pic Begins
                                                if ($propix == "") {
                                                    $propixy="img/default_pic.jpg";
                                                }
                                                else{
                                                    $propixy="$propix";
                                                }
                                                /// Profile pic Ends
                                                
                                                
                                                /// Profile pic crop Begins
                                                if ($propix2 == "") {
                                                    $propixy2="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $propixy2="$propix2";
                                                }
                                                /// Profile pic crop Ends
                                                
                                                $back_pic = $rollin['background_pic'];
                                                /// Profile pic Begins
                                                if ($back_pic == "") {
                                                    $back_pic="img/background_pic.jpg";
                                                }
                                                else{
                                                    $back_pic="$back_pic";
                                                }
                                                /// Profile pic Ends
?>            
          
     
        <div id="page-contents">
          <div class="row">
            <?php include("sider.php"); ?>
          <div class="col-md-7">
<h4 style="text-align: center;" class="grey"><i class="fa fa-search"></i> <?php echo $term; ?></h4>
            

            <!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                    
<div id="images" class="images">                             
<?php 
$getmag = $db->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') ORDER BY id DESC") or die($db->error());
$getmag->bind_param("ss", $post, $post);
$getmag->execute();
$getmag = $getmag->get_result();

$info = $getmag->num_rows;

$getposts = $db->prepare("SELECT * FROM users WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%') ORDER BY id DESC LIMIT 10" ) or die($db->error());
$getposts->bind_param("ss", $post, $post);
$getposts->execute();
$getposts = $getposts->get_result();

include("search_loop.php");
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
                         $.post("ajax_sarch.php?term=<?php echo $term; ?>",{load:loadclick},function(data){
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
                <center><div style="font-size: 14px; color: #999;">No record found...</div></center>
<?php 
}
?>                     
            </div>
          </div>
         <?php include("tradelist.php"); ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer
    ================================================= -->
  <?php include("footer.php"); ?>

  </body>


</html>
