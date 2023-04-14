<footer id="footer">
      
      
</footer>
    
    <!--preloader-->
    
    
<!--Popup-->
<div id="lascroll" class="modal fade comments" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">All Comments</div>
                            </div>
                            <div class="post-container">
                                <div id="kinalee">
                                    
                                </div>
                                <div class="line-divider"></div>
                                <div>
                                    <div style="text-align: center; font-size: 14px;" class="text-green">Comments</div>  
                                <div id="magic">    
                                
                                </div>    
                                    
                                    <center><div style="height: 14px;" id="lodma"></div></center>  
<?php 
                                                $get_lafoto = $db->query("SELECT * FROM users WHERE username='$user'");
                                                $get_laffax = $get_lafoto->fetch_assoc();
                                                $photopix = $get_laffax['profilecrop_pic'];
                                                if ($photopix == "") {
                                                 $photopix = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $photopix = "$photopix";
                                                }
?>                                
                                    <div class="post-detail">
                                  <form id="fomzzaz" onsubmit="return false">
                                  <textarea style="display: none;" id="id_nox">Photo id</textarea>
                                  <textarea style="display: none;" id="added_nox">Added by</textarea>    
                                  <div class="post-comment">
                                  <img src="<?php echo $photopix; ?>" alt="" class="profile-photo-sm" />
                                  <input id="arteec" type="text" class="form-control" placeholder="Post a comment">
                                  <span style="margin: 5px;">
                                      <button id="combtn" onClick='comment()' class='btn btn-default' type='submit'><i class= 'fa fa-share'></i></button>
	                          </span>
                                  
<script>
$("#combtn").prop("disabled", "disabled");
$("#arteec").on("keyup", function () {
  if ($(this).val() != "") {
    $("#combtn").prop("disabled", false);
  } else {
    $("#combtn").prop("disabled", "disabled");
  }
});
</script>                                       
                                  
<script type="text/javascript">
 // Sparrow main Javascript file
function comment() {
		var hr = new XMLHttpRequest();
		var url = "comment_proc.php";
                var arteec = document.getElementById("arteec").value;
		var added_nox = document.getElementById("added_nox").value;
	        var id_nox = document.getElementById("id_nox").value;
                var log_toox = document.getElementById("lodma");
   	        var vars = "getid="+id_nox+"&getU="+added_nox+"&arteec="+arteec;
		hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function() {
	        if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
	            document.getElementById("magic").innerHTML = return_data;
                    $('#lascroll').scrollTop($('#lascroll')[0].scrollHeight);
                    $('#arteec').val('');
                    $("#combtn").prop("disabled", "disabled");
		// jquery fade-out fade-in begins
                $("#lodma").delay(500).fadeOut("slow", function() {
                    log_toox.innerHTML = "";	        
                });
                $("#lodma").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
	    }
    }
    hr.send(vars);
    document.getElementById("lodma").innerHTML = "<img src='./lodaa.gif'>";
}
 </script>                          
                                  </div>
                                </form>
                                  </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">All Comments</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
<!--Popup-->
<div class="modal fade sharoll" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Reply chirp</div>
                            </div>
                            <div class="post-container">
                                <div id="kinvee">
                                    
                                </div>
                                <div class="post-detail"> 
                                  <center><div style="height: 14px;" id="lodvee"></div></center>  
                                  <form id="fomzzaz" onsubmit="return false">
                                  <textarea style="display: none;" id="id_vee">Photo id</textarea>
                                  <textarea style="display: none;" id="added_vee">Added by</textarea>    
                                  <div class="post-comment">
                                  <img src="<?php echo $photopix; ?>" alt="" class="profile-photo-sm" />
                                  <input id="artvee" type="text" class="form-control" placeholder="Post a reply">
                                  <span style="margin: 5px;">
                                      <button id="comlavee" onClick='shartaz()' class='btn btn-default' type='submit'><i class= 'fa fa-share'></i></button>
	                          </span>
                                  
<script>
$("#comlavee").prop("disabled", "disabled");
$("#artvee").on("keyup", function () {
  if ($(this).val() != "") {
    $("#comlavee").prop("disabled", false);
  } else {
    $("#comlavee").prop("disabled", "disabled");
  }
});
</script>                                       
                                  
<script type="text/javascript">
 // Sparrow main Javascript file
function shartaz() {
		var hr = new XMLHttpRequest();
		var url = "sharedat.php";
                var arteec = document.getElementById("artvee").value;
		var added_nox = document.getElementById("added_vee").value;
	        var id_nox = document.getElementById("id_vee").value;
                var log_vee = document.getElementById("lodvee");
   	        var vars = "getid="+id_nox+"&getU="+added_nox+"&arteec="+arteec;
		hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function() {
	        if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
	            document.getElementById("lodvee").innerHTML = return_data;
                    $('#artvee').val('');
                    $("#comlavee").prop("disabled", "disabled");
		// jquery fade-out fade-in begins
                $("#lodvee").delay(500).fadeOut("slow", function() {
                    log_vee.innerHTML = "";	        
                });
                $("#lodvee").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
	    }
    }
    hr.send(vars);
    document.getElementById("lodvee").innerHTML = "<img src='./lodaa.gif'>";
}
 </script>                          
                                  </div>
                                </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->
                    
                    <!--Popup-->
                    <div class="modal fade tubeurl" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Insert youtube video</div>
                            </div>
                            <div class="post-container">
                                <form id="fomvideo" method="post">   
                                  <div class="post-comment">
                                      <input style="margin-bottom: 10px;" id="vidurl" name="vidurl" type="text" class="form-control" placeholder="Enter youtube video URL">
                                      <textarea id="viddec" name="viddec" cols="30" rows="10" class="form-control" placeholder="Express yourself..."></textarea>
                                  <div style="margin-top: 10px; margin-bottom: 10px;" class="pull-right">
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Select youtube preview photo" style="font-size: 20px;"></i>   <input name="tubez" type="file" style="display: none;">
                                    </label>
                                      <button id="goyoutube" name="goyoutube" class="btn btn-primary " type="submit">Chirp</button>
                                  </div>
                                  </div>
                                </form>
                                
                                  <div style="height: 14px;" id="vid_status"></div>
                                  <div style="height: 14px;" id="vid_loada"><img src="./loader2.gif"></div> 
                                  
                                
                                
<script>
     
     $("#goyoutube").prop("disabled", "disabled");

$("#viddec").on("keyup", function () {
  if ($(this).val() != "") {
    $("#goyoutube").prop("disabled", false);
  } else {
    $("#goyoutube").prop("disabled", "disabled");
  }
});

$('#vid_loada').hide();
 
 </script>
 
 <script>
$(document).ready(function(){
   $('#fomvideo').on('submit', function(e){
       e.preventDefault();
       var viddiestat = document.getElementById("vid_status");
       var chekurl = document.getElementById("vidurl").value;
       if(chekurl == ""){
           viddiestat.innerHTML = "Provide a youtube video URL...";
       }
       else {
       $('#vid_loada').show();
      $.ajax({
         url: "youtube_video.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#vid_status").html(data);
                // jquery fade-out fade-in begins
                $("#vid_status").delay(3000).fadeOut("slow", function() {
                    viddiestat.innerHTML = "";	        
                });
                $("#vid_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
             $('#vid_loada').hide();
         }
      });
      $("#fomvideo :input").each( function() {
	   $(this).val('');
	});
        $("#goyoutube").prop("disabled", "disabled");
  }
   });
});
</script>   
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
<!--Popup-->
                    <div class="modal fade searchit" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Search Sparrow Network</div>
                            </div>
                            <div class="post-container">
                                <form id="fomsarch" method="post">   
                                  <div class="post-comment">
                                      <input id="searchdb" class="form-control input-group-lg" type="text" title="Enter search word" placeholder="Search Sparrow Network..." />
                                  </div>
                                </form>
                                <div id="sarch_resut"></div>
<script>
$(document).ready(function() {
    $('#searchdb').keyup(function() {
    document.getElementById("sarch_resut").innerHTML = "<center><img src='./loader2.gif'></center>";     
    var sarchword = document.getElementById("searchdb").value;
    $.post('sarch_db.php',{sarchword: sarchword},function(data) {
        $("#sarch_resut").html(data);
    });
});
});
</script>                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
                 
<!--Popup-->
                    <div class="modal fade lamenue" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Account</div>
                            </div>
                            <div class="post-container">
                                
                  <ul class="nav">
                    <li><a href="./<?php echo $user; ?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="crimson"><i class="fa fa-comments-o"></i> Crimson</a></li>
                    <li><a href="my_cashflow"><i class="fa fa-users"></i> Empower</a></li>
                    
                    <?php 
                    if($user == "admin" || $user == "support"){
                    ?>
                    <li><a href="admin_page"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php 
                    }
                    ?>
                    
                    <li><a href="del_messages"><i class="fa fa-trash"></i> Delete messages</a></li>
                    <li><a href="del_note"><i class="fa fa-trash"></i> Delete notifications</a></li>
                    
                    <?php 
                    if($user != "" && $user == "admin"){
                    ?>
                    <li><a href="trade_show"><i class="fa fa-shopping-cart"></i> Display tradefair</a></li>
                    <?php 
                    }
                    ?>
                    
                    <li><a href="my_trade"><i class="fa fa-shopping-cart"></i> Tradefair items</a></li>
                    <li><a href="delete_trade"><i class="fa fa-pencil"></i> Edit tradefair</a></li>
                    
                    <li><a href="settings"><i class="fa fa-wrench"></i> Settings</a></li>
                    <li><a href="logout"><i class="fa fa-power-off"></i> Logout</a></li>
                    
                  </ul>
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->    
                    
                    
<!--Popup-->
                    <div class="modal fade gogetit" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Edit Chirp</div>
                            </div>
                              <div id="editrel" class="post-container">
                                
                                <div id="sarch_resut"></div>                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->                               
    
    <!-- Scripts
    ================================================= -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>