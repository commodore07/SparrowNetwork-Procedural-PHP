<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php include("ago.php"); ?>  
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('lastcrim.php',{post: post});
});
</script>    
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
                                                $blogkit = $roz['blogxee'];
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
<?php 
if($blogkit == "on"){
?>                            
            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
            	<div class="row">
                   <form id="uploadForm" method="post">
            	<div class="col-md-7 col-sm-7">
                  <div class="form-group">
                    <img src="<?php echo $profilepic; ?>" alt="" class="profile-photo-md" />
                    <textarea name="postax" id="post" cols="30" rows="1" class="form-control" placeholder="Express yourself..."></textarea>
                  </div>
                </div>
            		<div class="col-md-5 col-sm-5">            
                  <div class="tools">
                    <ul class="publishing-tools list-inline">
                       
                       <li>
                           <label style="cursor: pointer;" class="btn-file">
                                <i class="fa fa-camera" title="Upload photo"></i>  <input name="file1" type="file" style="display: none;">
                           </label>
                       </li>
                       <li>
                           <label style="cursor: pointer;" class="btn-file">
                                <i class="fa fa-camera-retro" title="Upload multiple photos"></i>  <input type="file" name="files[]" multiple style="display: none;">
                           </label>
                       </li>
                       <li><a style="cursor: pointer;" data-toggle="modal" data-target=".tubeurl"><i title="Embed youtube videos" class="ion-ios-videocam"></i></a></li>
                       <li id="loader"><img src="./loader2.gif"></li> 
                    </ul>
                      <button id="post_update" class="btn btn-primary pull-right">Chirp</button>
                      <div id="gallerie"></div>
                  </div>
                                          
                </div>
                </form> 
                    
<script>
     
     $("#post_update").prop("disabled", "disabled");

$("#post").on("keyup", function () {
  if ($(this).val() != "") {
    $("#post_update").prop("disabled", false);
  } else {
    $("#post_update").prop("disabled", "disabled");
  }
});

$('#loader').hide();
 
 </script>
 
<script>
$(document).ready(function(){
   $('#uploadForm').on('submit', function(e){
      e.preventDefault();
      $('#loader').show();
      $.ajax({
         url: "send_post_crimson.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#freshchirp").html(data);
             $('#loader').hide();
             $("#post_update").prop("disabled", "disabled");
             $("#uploadForm :input").each( function() {
	   $(this).val('');
	});
         }
      });
   });
});
</script>    
            		
            	</div>
            </div><!-- Post Create Box End-->
<?php 
}
?>
            <!-- Post Content
            ================================================= -->
            <div id="freshchirp"></div>    
            
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM posts WHERE empty1='crimson' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM posts WHERE empty1='crimson' ORDER BY id DESC LIMIT 10" ) or die($db->error());
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
                         $.post("ajax.php",{load:loadclick},function(data){
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
