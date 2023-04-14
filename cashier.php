<!DOCTYPE html>
<html lang="en">
	
<?php include("header.php"); ?>
    <link href="css/lacustom.css" rel="stylesheet">
    
<?php 
if($user != ""){
?>    
    <link href="css/custom.css" rel="stylesheet">
<?php 
}
?> 
    
<?php
$get_cuv = $db->query("SELECT * FROM users WHERE username='$user'");
$rocuv = $get_cuv->fetch_assoc();
$chekuv = $rocuv['me_cashier'];
if($chekuv == ""){
    echo "<meta http-equiv=\"refresh\" content=\"0; url=$user.trade\">";
	exit();
} else {
    
}
?>        
    
    <link href="datetim/css/style.css" rel="stylesheet">
    <link href="datetim/css/magnific-popup.css" rel="stylesheet">
    <link href="datetim/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
<?php include("ago.php"); ?> 
    
<?php
//// Check if a cashier
   $lim_xeea = $db->query("SELECT * FROM users WHERE username='$user'");
   $rollin = $lim_xeea->fetch_assoc();
   $fexeea = $rollin['me_cashier']; 
if($fexeea == ""){
    $username = "$username";
} else {
    $username = "$fexeea";
}   
?>    
    
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('trade_view.php?U=<?php echo $username; ?>',{post: post});
});
</script>     
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
          
        <div style="background: url('<?php echo $back_pic; ?>') no-repeat;" class="timeline-cover">

          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                  <img src="<?php echo $propixy ?>" alt="" class="img-responsive profile-photo" />
                  <h3><?php echo $fnee ?></h3>
                  <p class="text-muted">@<a href="./<?php echo $username; ?>"><?php echo $username; ?></a></p>
                </div>
              </div>
              <div class="col-md-9">
                <?php include("fola_folli.php"); ?>   
                <ul class="list-inline profile-menu">
                  <li><a href="./<?php echo $username; ?>">Timeline</a></li>
                  
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a><span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a><span class="text-green"><?php echo $folli; ?></span></li>
                  
                  
<?php 
if($user != ""){
?>                   
                  
                  <li>
                    <header>
	                <div class="box-nav">                                   
		            <a href="#modalOrder" class="popup-link">Track</a>				
	                </div>
	            </header>
                  </li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".expenx">Expenses</a></li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".servenz">Services</a></li>
                  
<?php 
}
?>                  
                  
                  
                </ul>
                <ul class="follow-me list-inline">
                  
                  
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="<?php echo $propixy ?>" alt="" class="img-responsive profile-photo" />
              <h4><?php echo $fnee ?></h4>
              <p class="text-muted">*<a href="./<?php echo $username; ?>.trade"><?php echo $username; ?></a></p>
            </div>
            <div class="mobile-menu">
                <ul class="list-inline">
                  <li><a href="./<?php echo $username; ?>">Timeline</a></li>
                  
                  <li><a href="followers?u=<?php echo $username; ?>">Followers</a> <span class="text-green"><?php echo $fola; ?></span></li>
                  <li><a href="following?u=<?php echo $username; ?>">Following</a> <span class="text-green"><?php echo $folli; ?></span></li>
                  
<?php 
if($user != ""){
?>                  
                  <li>
	                <div class="box-nav">                                   
		            <a href="#modalOrder" class="popup-link">Track</a>				
	                </div>
                  </li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".expenx">Expenses</a></li>
                  <li><a style="cursor: pointer;" data-toggle="modal" data-target=".servenz">Services</a></li>
                  
<?php 
}
?>                  
                  
                  
                </ul>
              
            </div>
          </div><!--Timeline Menu for Small Screens End-->

        </div>
        <div id="page-contents">
          <div class="row">
            <?php include("sider2.php"); ?>
        
              <div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            

            <!-- Media
            ================================================= -->
            <div class="media">
            	<div class="row">
<?php 
if($user != ""){
?>                    
                    
                    <?php include("statistics_trade.php"); ?>  
<?php 
}
?>  

<?php 
if($user != ""){
?>                    
                <div class="grid-item col-md-6 col-sm-6">
            	  <div class="media-grid">
            <form class="navbar-form">
                <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" id="checkpdt" type="text" title="Enter product name" placeholder="Search product..." />
                      </div>
                </div>
            </form>
                      
<script>
$(document).ready(function() {
    $('#checkpdt').keyup(function() {
    var chakio = document.getElementById("checkpdt").value;
    $.post('chakio.php?UX=<?php echo $username; ?>',{chakio: chakio},function(data) {
        $("#brevage").html(data);
    });
});
});
</script>                      
                    
                  </div>
            	</div>
                <div class="grid-item col-md-6 col-sm-6">
            	  <div class="media-grid">
            <form class="navbar-form">
                <div class="input-group">
                    <input type="text" id="pdteeid" class="form-control" placeholder="Search product id...">
                    <span class="input-group-btn">
                        <button data-toggle="modal" data-target=".plioid" class="btn btn-default" id="pdteebtn" type="button"><i style="color: #999;" class="fa fa-search"></i></button>
                    </span>
                </div><!-- /input-group -->
            </form>
                      
<script>
$(document).ready(function() {
    $('#pdteebtn').click(function() {
    var pdteeword = document.getElementById("pdteeid").value;
    $.post('trackx.php?UX=<?php echo $username; ?>',{pdteeword: pdteeword},function(data) {
        $("#soxket").html(data);
    });
});
});
</script>                       
                    
                  </div>
            	</div>
                    
                    <div id="brevage">
                      
                    </div>
                    
<?php 
}
?>                    
                
<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM tradefair WHERE username='$username' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM tradefair WHERE username='$username' ORDER BY id DESC LIMIT 10" ) or die($db->error());
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
                         $.post("ajaxtrade.php?U=<?php echo $username; ?>",{load:loadclick},function(data){
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

        <div id="modalOrder" class="zoom-anim-dialog white-popup">
		<div class="text-center">
			<h2>Track Transaction</h2></div>
<?php 
if (isset($_POST["namzor"])) {
$delxa = strip_tags($_POST['namzor']);
echo "<meta http-equiv=\"refresh\" content=\"0; url=cashier_tran?track_id=$delxa&uve=$user\">";  
}
?>            
                <form class="boxed-form" method="post" novalidate="novalidate">
			<div class="form-row">
				<div class="form-row-group--date">
					<div class="form-row-label">Transaction Date</div>
					<div class="form-row-group">
						<div class="datetimepicker-wrap">
                                                    <input type="text" name="namzor" class="form-control datetimepicker" placeholder="">
						</div>
					</div>
				</div>
			</div>
                    
                    <div style="margin-top: 10px; margin-bottom: 10px;" class="text-center">
                        <input class="btn btn-primary" type="submit" value="Submit">
		    </div>
                    <div style="background: url('<?php echo $back_pic; ?>') no-repeat;" class="timeline-cover"></div>
		</form>
	</div> 
    
 <div class="modal fade expenx" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Expenses</div>
                            </div>
                            <div class="post-container">
                                
                                <form id="fommdoq" method="post">  
                                  <div class="row">
                                    <div class="form-group col-xs-12">
                                        <input class="form-control input-group-lg" name="doqamt" id="doqamt" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrictdoq('doqamt')" maxlength="20" type="text" title="Enter product name" placeholder="Amount" />
                                    </div>
                                  </div>  
                                    
<script>
function restrictdoq(elemdoq){
	var tfdoq = document.getElementById(elemdoq);
	var rxdoq = new RegExp;
	if(elemdoq == "doqamt"){
		rxdoq = /[^0-9]/gi;
	}
	tfdoq.value = tfdoq.value.replace(rxdoq, "");
}
</script>                                    
                                    
                                  <div class="post-comment">
                                      <textarea id="doqmsg" name="doqmsg" cols="30" rows="10" class="form-control" placeholder="Type in description..."></textarea>
                                  <div style="margin-top: 10px; margin-bottom: 10px;" class="pull-right">
                                    
                                      <button id="doqupdate" class="btn btn-primary " type="submit"><i class="fa fa-paper-plane-o"></i> Update</button>
                                  </div>
                                      <div style="height: 14px;" id="doq_status"></div>
                                      <div id="doqloada" style="height: 14px;"><img src="./loader2.gif"></div> 
                                  </div>
                                </form>
                                
<script>
     
     $("#doqupdate").prop("disabled", "disabled");

$("#doqmsg").on("keyup", function () {
  if ($(this).val() != "") {
    $("#doqupdate").prop("disabled", false);
  } else {
    $("#doqupdate").prop("disabled", "disabled");
  }
});

$('#doqloada').hide();
 
 </script>
 
 <script>
$(document).ready(function(){
   $('#fommdoq').on('submit', function(e){
       e.preventDefault();
       var doqstat = document.getElementById("doq_status");
       $('#doqloada').show();
      $.ajax({
         url: "doq.php?UK=<?php echo $username; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#doq_status").html(data);
                // jquery fade-out fade-in begins
                $("#doq_status").delay(3000).fadeOut("slow", function() {
                    doqstat.innerHTML = "";	        
                });
                $("#doq_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
             $('#doqloada').hide();
         }
      });
      $("#fommdoq :input").each( function() {
	   $(this).val('');
	});
        $("#doqupdate").prop("disabled", "disabled");
  
   });
});
</script>                                   
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
                    <?php include("my_services.php"); ?>    
                    
<!--Popup-->
                    <div class="modal fade plioid" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Search product id</div>
                            </div>
                              <div id="soxket" class="post-container">
                                
                  
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->                              
    
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
