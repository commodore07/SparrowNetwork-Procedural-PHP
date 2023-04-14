<!DOCTYPE html>
<html lang="en">
<?php $username = ""; ?>	
<?php include("headervoid.php"); ?>
    <link href="css/lacustom.css" rel="stylesheet">
    <?php 
if($user != ""){
?>    
    <link href="css/custom.css" rel="stylesheet">
<?php 
}
?> 
    
    <link href="datetim/css/style.css" rel="stylesheet">
    <link href="datetim/css/magnific-popup.css" rel="stylesheet">
    <link href="datetim/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
<?php include("ago.php"); ?> 
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('trade_view.php?U=<?php echo $username; ?>',{post: post});
});
</script> 

<?php 
$temooo = (!empty($_GET['term']) ? $_GET['term'] : null);
$temooo = $db->real_escape_string($temooo); 
?>  

  <body>

    <!-- Header
    ================================================= -->
    <?php include("header_trade.php"); ?> 		
    <!--Header End-->

    <div class="container">

      <!-- Timeline
      ================================================= -->
      <div>
          
<?php 
$get_phot = $db->query("SELECT * FROM users WHERE username='$username'");
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

            <!-- Post Create Box
            ================================================= -->
            

            <!-- Media
            ================================================= -->
            <div class="media">
            	<div class="row">

                    <h4 style="text-align: center;" class="grey">#<?php echo $temooo; ?></h4>
                
<div id="images" class="images">                             
<?php 
$getmag = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') ORDER BY id DESC") or die($db->error());
$getmag->bind_param("s", $temooo);
$getmag->execute();
$getmag = $getmag->get_result();

$info = $getmag->num_rows;

$getposts = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') ORDER BY id DESC LIMIT 10" ) or die($db->error());
$getposts->bind_param("s", $temooo);
$getposts->execute();
$getposts = $getposts->get_result();

include("trade_loop.php");
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
                             $('.messages').text("No more item to display");
                             $('.procin').hide();
                             $('#readmore').hide();
                         }
                         else{
                         $.post("ajaxtradesarchgrand.php?U=<?php echo $username; ?>&term=<?php echo $temooo; ?>",{load:loadclick},function(data){
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
                <center><i style="font-size: 150px; color: #999;" class="fa fa-shopping-cart"></i></center>  
                <center><div style="font-size: 14px; color: #999;">No tradefair item yet...</div></center>
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
  <?php include("footer_trade.php"); ?>
        <script src="datetim/js/jquery.magnific-popup.min.js"></script>
        <script src="datetim/js/moment.min.js"></script>
        <script src="datetim/js/bootstrap-datetimepicker.min.js"></script>
        <script src="datetim/js/main.js"></script>
    <?php include("tradepic_change.php"); ?>
    <?php include("sell_item.php"); ?>     
  <script src="js/masonry.pkgd.min.js"></script>
  </body>


</html>
