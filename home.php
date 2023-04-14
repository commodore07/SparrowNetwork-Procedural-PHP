<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php include("ago.php"); ?> 
        
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('lastpost.php',{post: post});
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
                                                $lastpost = $roz['online'];
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
         url: "send_post.php",
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

            <!-- Post Content
            ================================================= -->
            <div id="freshchirp"></div>            
            
<div id="images" class="images">                             
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

$query_follow = "SELECT * FROM posts WHERE";

foreach ($follzie as $each){
    $i++;
    //echo $i.'<p>&nbsp;</p>';

    if ($i == 1)
    {
        $query_follow .= " added_by = '$each' && wall!='wall' && empty1!='crimson'";
        //echo $query_follow.'<p>&nbsp;</p>';
    }     
    else
    {
        $query_follow .= "OR added_by = '$each' && wall!='wall' && empty1!='crimson'";	 
        //echo '<p><b>'.$query_follow.'</b></p>';
    }
}
//var_dump($follzie);
$getmag = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;
$getposts = $db->query("$query_follow OR added_by='$user' && wall!='wall' && empty1!='crimson' ORDER BY id DESC LIMIT 10") or die($db->error());
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
                         $.post("ajax_home.php",{load:loadclick},function(data){
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
                <div id="shadow" style="text-align: center;">         
                    <div class=" col-md-12">
                
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>

                    <!-- Title -->

                    <div>
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Welcome to Sparrow Network
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      Sparrow Network is an online community where people empower each other.
                      Start following people now, to engage with them and know what is happening in their lives.
                        </p></center>

                    </div>
                                   
                  </div>
                  </div>
                
                <div style="margin-top: 10px;" id="chat-block">
              <div class="title">Who to follow</div>
              <ul class="online-users list-inline">
                  
<?php 
$getinftie = $db->query("SELECT * FROM users WHERE username != '$user' ORDER BY RAND() LIMIT 16" ) or die($db->error());
while ($roz = $getinftie->fetch_assoc()) {
                                                $unkie = $roz['username'];
                                                $fnkie = $roz['fullname'];
                                                $pcropkie = $roz['profilecrop_pic'];
                                                if($pcropkie == ""){
                                                    $cropic = "img/default_pic";
                                                }
                                                else {
                                                    $cropic = "$pcropkie";
                                                }
                                                    
?>              
              <li><a href="./<?php echo $unkie; ?>" title="<?php echo $fnkie; ?>"><img src="<?php echo $cropic; ?>" alt="<?php echo $unkie; ?>" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
         
<?php 
}
?>                
                
              </ul>
              
            </div><!--chat block ends-->
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
