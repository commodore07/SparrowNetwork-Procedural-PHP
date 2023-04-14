<!DOCTYPE html>
<html lang="en">
	
<?php include("headervoid.php"); ?>
<?php include("ago.php"); ?> 
<?php
$term = (!empty($_GET['term']) ? $_GET['term'] : null);
$term = $db->real_escape_string($term); 
$term = str_replace("'", "&apos;", $term);
$term = str_replace("\'","", $term);
?>    
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
                            
<?php
$getinfoz = $db->query("SELECT * FROM users WHERE username='$user'" ) or die($db->error());
$roz = $getinfoz->fetch_assoc();
    
                                                $fulname = $roz['fullname'];
                                                $phone = $roz['phone'];
                                                if($phone == ""){
                                                    $phone = "Secret";
                                                }
                                                else {
                                                    $phone = "$phone";
                                                }
                                                $profilepic = $roz['profilecrop_pic'];
                                                if ($profilepic == "") {
                                                 $profilepic = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic = "$profilepic";
                                                }
?>     
                            
            <!-- Post Create Box
            ================================================= -->
            <!-- Post Create Box End-->
            <h4 style="text-align: center;" class="grey">#<?php echo $term; ?></h4>
            <!-- Post Content
            ================================================= -->
<div id="images" class="images">                             
<?php 
$getmag = $db->prepare("SELECT * FROM posts WHERE body LIKE CONCAT('%',?,'%') ORDER BY id DESC") or die($db->error());
$getmag->bind_param("s", $term);
$getmag->execute();
$getmag = $getmag->get_result();

$info = $getmag->num_rows;

$getposts = $db->prepare("SELECT * FROM posts WHERE body LIKE CONCAT('%',?,'%') ORDER BY id DESC LIMIT 10" ) or die($db->error());
$getposts->bind_param("s", $term);
$getposts->execute();
$getposts = $getposts->get_result();

include("while_loop.php");
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
                         $.post("ajax_hash.php?term=<?php echo $term; ?>",{load:loadclick},function(data){
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-hashtag"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No result found...</div></center>
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
