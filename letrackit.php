<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
<?php include("ago.php"); ?> 
  <body>
      
<?php
$empty1 = "";

$temex = (!empty($_GET['term']) ? $_GET['term'] : null);
$temex = $db->real_escape_string($temex); 
$temex = str_replace("'", "&apos;", $temex);
$temex = str_replace("\'","", $temex);

$origid = (!empty($_GET['trad']) ? $_GET['trad'] : null);
$origid = $db->real_escape_string($origid); 
$origid = str_replace("'", "&apos;", $origid);
$origid = str_replace("\'","", $origid);
?>  

    <!-- Header
    ================================================= -->
    <?php include("header_prev.php"); ?> 		
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    	<?php 
$get_vind = $db->query("SELECT * FROM users WHERE username='$user'");
$rolee = $get_vind->fetch_assoc();
$flevind = $rolee['fullname'];
$propind = $rolee['profilecrop_pic'];
if($propind == ""){
    $propind = "./img/default_pic2.jpg";
}
else {
    $propind = "$propind";
}
?>
<?php 
//// Follower count
$folita = $db->query("SELECT * FROM follows WHERE followe = '$user'");
$foldataz = $folita->num_rows;
if($foldataz == 0){
    $fozcaz = "No follower yet";
}
else if($foldataz == 1){
    $fozcaz = "1 follower";
}
else {
    $fozcaz = "$foldataz followers";
}
?>
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

            <!-- Post Content
            ================================================= -->
            <div id="freshchirp"></div>    
            
                           
<?php 
$getposts = $db->prepare("SELECT * FROM posts WHERE id=?" ) or die($db->error());
$getposts->bind_param("s", $temex);
$getposts->execute();
$getposts = $getposts->get_result();

include("while_loop.php");
?>


<?php 
if($empty1 == "tradefairpic"){
?>
<center>
    <a href="./<?php echo $added_by; ?>.trade">
    <button class="btn btn-primary" style="margin-bottom: 10px;">Go back</button>
</a>
</center>
<?php 
} else {
?>            
<center>
    <a href="./<?php echo $added_by; ?>">
        <button class="btn btn-primary" style="margin-bottom: 10px;">Go back</button>
</a>
</center>
<?php 
}
?>   

            <!-- Chat Room
            ================================================= -->
            
 <div class="chat-room">
     <div style="margin-bottom: 10px;"  class="row">
                <div class="col-md-12">

                  <!-- Contact List in Left-->
                  <ul id="images" class="nav nav-tabs contact-list">
                     
<?php 
$getmag = $db->prepare("SELECT * FROM product_statuz WHERE prod_id=? ORDER BY id DESC") or die($db->error());
$getmag->bind_param("s", $origid);
$getmag->execute();
$getmag = $getmag->get_result();
$info = $getmag->num_rows;

$getinftee = $db->prepare("SELECT * FROM product_statuz WHERE prod_id=? ORDER BY id DESC LIMIT 10" ) or die($db->error());
$getinftee->bind_param("s", $origid);
$getinftee->execute();
$getinftee = $getinftee->get_result();
include("while_trackex.php");
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
                             $('.messages').text("No more result to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("mytrackaz.php?I=<?php echo $origid; ?>",{load:loadclick},function(data){
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
                <div>
                <center><i style="font-size: 150px; color: #999;" class="fa fa-star-o"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No transaction history yet...</div></center>
                </div>
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

    <!-- Footer
    ================================================= -->
   <?php include("footer.php"); ?>
  </body>


</html>
