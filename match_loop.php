<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$followe = $row['follower'];
$get_user = $db->query("SELECT * FROM users WHERE username='$followe'");
$get_ufo = $get_user->fetch_assoc();
$funame = $get_ufo['fullname'];
$usename = $get_ufo['username'];  
$pro_crop = $get_ufo['profilecrop_pic'];  
                                                /// Profile pic Begins
                                                if ($pro_crop == "") {
                                                    $proc="img/default_pic2.jpg";
                                                }
                                                else{
                                                    $proc="$pro_crop";
                                                }
                                                /// Profile pic Ends
$back_crop = $get_ufo['backgroundcrop_pic']; 
                                                /// Profile pic Begins
                                                if ($back_crop == "") {
                                                    $broc="img/backgroundcrop_pic.jpg";
                                                }
                                                else{
                                                    $broc="$back_crop";
                                                }
                                                /// Profile pic Ends
?>
	  
<!-- Post Content
================================================= -->
                <div class="col-md-6 col-sm-6">
                  <div class="friend-card">
                  	<img src="<?php echo $broc; ?>" alt="profile-cover" class="img-responsive cover" />
                  	<div class="card-info">
                      <img src="<?php echo $proc; ?>" alt="user" class="profile-photo-lg" />
                      <div class="friend-info">
<?php 
if($user != ""){
$cheztax = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$followe'");
// Count the amount of rows where username = $un
$chaxcount = $cheztax->num_rows;
?>    
    
<div id="felkax" class="pull-right">
<?php 
if ($chaxcount == 0) {
?>        
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
</div>
   
<?php 

}

?> 
                          
<script language="javascript">
         function togglezax<?php echo $id; ?>() {
           var ele = document.getElementById("followxizaz<?php echo $id; ?>");
           var ble = document.getElementById("unfollowxizaz<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ble.style.display = 'block';
              ele.style.display = 'none';
           }
           else
           {
             ble.style.display = 'none';
             ele.style.display = 'block';
           }
         }
</script> 

<script>
$(document).ready(function() {
    $('#followxizaz<?php echo $id; ?>').click(function() {
        
    var follo = "<?php echo $usename; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowxizaz<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $usename; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>                          
                          
                      	<h5><a href="./<?php echo $usename; ?>" class="profile-link"><?php echo $funame; ?></a></h5>
                        <p>@<a href="<?php echo $usename; ?>"><?php echo $usename; ?></a></p>
                        Account name: Commodore Davison <br>
                        Account number: 2020539283 <br>
                        Bank: Zenith Bank PLC <br>
                        Phone number: 07063046338<br>
                        Amount: 100,000
                        <a class="text-green" href=""> Match now</a>
                      </div>
                    </div>
                  </div>
                </div>
                                    
                                    
<?php
}
?>