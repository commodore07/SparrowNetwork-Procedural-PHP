<?php 
$get_oix = $db->query("SELECT * FROM users WHERE username='$username'");
$rolex = $get_oix->fetch_assoc();
$vox = $rolex['me_cashier'];
if($vox != ""){
    $username = "$vox";
} else {
    $username = "$username";
}

// Check for cashier status
   $lim_chevv = $db->query("SELECT * FROM users WHERE username='$user' AND me_cashier='$username'");
   $checklivv = $lim_chevv->num_rows;
?>

<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$uname = $row['username'];
                                                $username = "$uname";
                                                $priceey = $row['price'];
						$name = $row['name'];
						$price = $row['price'];
                                                $price = number_format($price);
						$tradkey = $row['brand'];
						$describe = $row['describeit'];
						$item_pics = $row['actual_pic']; 
                                                $qteey = $row['item_qty'];
                                                if($qteey == ""){
                                                    $qteey = "0";
                                                }
                                                else {
                                                    $qteey = "$qteey";
                                                }
                                                
                                                $idee = $db->query("SELECT * FROM users WHERE username='$uname'") or die($db->error());
                                                $row = $idee->fetch_assoc();
						$vac1 = $row['vac1'];
                                                $vac2 = $row['vac3'];
                                                
                                               
                                                


$getinfoz = $db->query("SELECT * FROM users WHERE username='$uname'" ) or die($db->error());
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
    
    

$getinf = $db->query("SELECT * FROM cart WHERE item_id='$id' AND buyer='$user'" ) or die($db->error());
$pazzax = $getinf->num_rows;



                                                if ($pazzax == 0) {
                                                 $pazkee = "<button onclick='cart$id()' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</button>";
                                                }
                                                else
                                                {
                                                    
                                                 $pazkee = "<button onclick='remove$id()' style='color: #fff; background-color: #00BFFF;' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Remove from cart</button>";   
                                                    
                                                }
                                                
$get_posx = $db->query("SELECT * FROM posts WHERE vee1='$tradkey'");
$rollin = $get_posx->fetch_assoc();
$tid = $rollin['id'];     
$tidby = $rollin['added_by']; 
$boddie = $rollin['body']; 
?>
	  


<?php 
$get_noq = $db->query("SELECT * FROM post_comments WHERE post_id='$tid' ORDER BY id DESC LIMIT 10");
$rolva = $get_noq->fetch_assoc();
$timenoq = $rolva['time'];
?>

<script>   
$(document).ready(function() {
    $('#comments<?php echo $id; ?>').click(function() {
    document.getElementById("kinalee").innerHTML = "<center><img src='./loader2.gif'></center>";    
    document.getElementById("magic").innerHTML = "<center><img src='./loader2.gif'></center>";   
    document.getElementById("magicnew").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var log_magicnew = document.getElementById("magicnew");
               // jquery fade-out fade-in begins
                $("#magicnew").delay(1000).fadeOut("slow", function() {
                    log_magicnew.innerHTML = "";	        
                });
                $("#magicnew").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends    
    var fn = "<?php echo $timenoq; ?>";
    document.getElementById("id_nox").innerHTML="<?php echo $tid; ?>"; 
    document.getElementById("added_nox").innerHTML="<?php echo $tidby; ?>";
    document.getElementById("timazzoq").innerHTML="<?php echo $timenoq; ?>";     
    $.post('tradetz.php?I=<?php echo $tradkey; ?>',{post: fn},function(data) {
        //// Profile pic small
        var comid = "<?php echo $tid; ?>";
        $.post('cheezi2.php',{comid: comid},function(data) {
	$("#magic").html(data);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $tid; ?>";
        $.post('chivtime.php',{chiv: chiv},function(data) {   
	$("#timazzoq").html(data);
        });
        ///// end 
        $("#kinalee").html(data);                
    });
});
});
</script>     

<script type="text/javascript">
 // Sparrow main Javascript file
function shareit<?php echo $id ?>() {
		var hr = new XMLHttpRequest();
		var url = "share.php?I=<?php echo $tid; ?>";
		var fn = "<?php echo $id; ?>";
   	    var vars = "post="+fn;
		hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
            document.getElementById("id_vee").innerHTML="<?php echo $tid; ?>"; 
            document.getElementById("added_vee").innerHTML="<?php echo $tidby; ?>";
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("kinvee").innerHTML = return_data;
	    }
    }
    hr.send(vars);
    document.getElementById("kinvee").innerHTML = "<center><img src='./loader2.gif'></center>";
}
</script>
<!-- Tradefair Items
            ================================================= -->
           <div class="grid-item col-md-6 col-sm-6">
            	  <div class="media-grid">
                      <div id="comments<?php echo $id; ?>" class="img-wrapper" data-toggle="modal" data-target=".comments">
                      <img src="<?php echo $item_pics; ?>" alt="" class="img-responsive post-image" />
                    </div>
                    <div class="media-info">
                      <div class="reaction">
<?php 
//////// Share Count
$sheerit = $db->query("SELECT * FROM share WHERE like_id = '$tid'");
// Count the amount of rows where username = $un
$sheerdat = $sheerit->num_rows;
if($sheerdat == 0){
    $sheetaek = "";
}
else {
    $sheetaek = "$sheerdat";
}
/////// End Share Count
?>                          
                  <div class="">


<span>                    
<?php 
if($user != ""){
$likepost = $db->query("SELECT * FROM likes WHERE liker='$user' && likee='$tidby' && like_id = '$tid'");
// Count the amount of rows where username = $un
$likecount = $likepost->num_rows;
//// Like count
$likit = $db->query("SELECT * FROM likes WHERE like_id = '$tid'");
// Count the amount of rows where username = $un
$likedat = $likit->num_rows;
if($likedat == 0){
    $cantae = "";
}
else {
    $cantae = "$likedat";
}
?>
    
<?php 
if($likecount == 0){
?>                    
    <a title="Like chirp" id="like<?php echo $id; ?>" onclick="togoo<?php echo $id; ?>()" style="display: block;" class="btn text-red pull-right"><i class="fa fa-heart-o"></i> <span id="dolaz<?php echo $id; ?>"><?php echo $cantae; ?></span></a>
    <a title="Unlike chirp" id="unlike<?php echo $id; ?>" onclick="togoo<?php echo $id; ?>()" style="display: none;" class="btn text-red pull-right"><i class="fa fa-heart"></i> <span id="paolaz<?php echo $id; ?>"><?php echo $cantae; ?></span></a> 
<?php 
} else {
?> 
    <a title="Like chirp" id="like<?php echo $id; ?>" onclick="togoo<?php echo $id; ?>()" style="display: none;" class="btn text-red pull-right"><i class="fa fa-heart-o"></i> <span id="paolaz<?php echo $id; ?>"><?php echo $cantae; ?></span></a>
    <a title="Unlike chirp" id="unlike<?php echo $id; ?>" onclick="togoo<?php echo $id; ?>()" style="display: block;" class="btn text-red pull-right"><i class="fa fa-heart"></i> <span id="dolaz<?php echo $id; ?>"><?php echo $cantae; ?></span></a> 
<?php 
}
?>  
  
<textarea style="display: none;" id="likxzvax<?php echo $id; ?>"><?php echo $cantae; ?></textarea>     
    
<script language="javascript">
         function togoo<?php echo $id; ?>() {
           var ele = document.getElementById("like<?php echo $id; ?>");
           var ble = document.getElementById("unlike<?php echo $id; ?>");
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
    $('#like<?php echo $id; ?>').click(function() {
     
    var gexliz = document.getElementById("likxzvax<?php echo $id; ?>").value; 
    
    if(gexliz == ""){
        gexliz = 0;
    } else {
        gexliz = gexliz;
    }
    
    var lixpoz = parseFloat(gexliz) + 1;
        $("#likxzvax<?php echo $id; ?>").html(lixpoz);
        $("#paolaz<?php echo $id; ?>").html(lixpoz);
        $("#dolaz<?php echo $id; ?>").html(lixpoz); 
     
    var follo = "<?php echo $tid; ?>";
    $.post('like.php?U=<?php echo $tidby; ?>',{follo: follo},function(data) {
        $("#dolaz<?php echo $id; ?>").html(data);
        $("#paolaz<?php echo $id; ?>").html(data);
        $("#likxzvax<?php echo $id; ?>").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unlike<?php echo $id; ?>').click(function() {
    
    var gexminx = document.getElementById("likxzvax<?php echo $id; ?>").value; 
    
    if(gexminx == ""){
        gexminx = 0;
    } else {
        gexminx = gexminx;
    }
    
    var lixminx = parseFloat(gexminx) - 1;
    if(lixminx == 0){
        lixminx = "";
    } else {
        lixminx = lixminx;
    }
        $("#likxzvax<?php echo $id; ?>").html(lixminx);
        $("#dolaz<?php echo $id; ?>").html(lixminx);
        $("#paolaz<?php echo $id; ?>").html(lixminx);
    
    var follo = "<?php echo $tid; ?>";
    $.post('unlike.php?U=<?php echo $tidby; ?>',{follo: follo},function(data) {
        $("#dolaz<?php echo $id; ?>").html(data);
        $("#paolaz<?php echo $id; ?>").html(data);
        $("#likxzvax<?php echo $id; ?>").html(data);
    });
});
});
</script>  
                    
<?php 
} else {
?>
<?php 
//// Like count
$likita = $db->query("SELECT * FROM likes WHERE like_id = '$id'");
// Count the amount of rows where username = $un
$likedataz = $likita->num_rows;
if($likedataz == 0){
    $cantava = "";
}
else {
    $cantava = "$likedataz";
}
?>
    <a title="Like chirp" data-toggle="modal" data-target=".logoutin" class="btn text-red pull-right"><i class="fa fa-heart-o"></i> <span><?php echo $cantava; ?></span></a> 
<?php 
}
?>
</span>
                    <ul class="list-inline social-icons">
                        
<?php
if($user != ""){                    
?>
<li><a onClick="shareit<?php echo $id; ?>()" style="cursor: pointer;" data-toggle="modal" data-target=".sharoll" title="Reply chirp"><i class="fa fa-share-square-o"></i></a></li>
<?php 
} else {
?>
<li><a title="Reply chirp" data-toggle="modal" style="cursor: pointer;" data-target=".logoutin"><i class="fa fa-share-square-o"></i> <span></span></a></li> 
<?php
}
?>
                        
                        <li><a target="_blank" href="https://web.facebook.com/sharer/sharer.php?u=http://sparrownetwork.net/<?php echo $tid; ?>.html&text=<?php echo $boddie; ?>" title="Share on facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/share?url=http://sparrownetwork.net/<?php echo $tid; ?>.html&text=<?php echo $boddie; ?>" title="Share on twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="whatsapp://send?text=<?php echo $boddie; ?>... see more stories http://sparrownetwork.net/<?php echo $tid ?>.html" title="Share on whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                  </div>
                      </div>
                      <div class="user-info">
                        <img src="<?php echo $profilepic; ?>" alt="" class="profile-photo-sm pull-left" />
                        
<?php 
if($user != "" && $user != "$username" && $checklivv == 0){
$checkee = $db->query("SELECT * FROM cart WHERE buyer='$user' && item_id='$id'");
// Count the amount of rows where username = $un
$checkvaz = $checkee->num_rows;
?>                            
                        
<div id="felkax" class="pull-right">
<?php 
if ($checkvaz == 0) {
?>        
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-cart-arrow-down"></i> Remove</button>
<?php 
}
else {
?>    
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-cart-arrow-down"></i> Remove</button>
<?php 
}
?>    
</div>
<?php 
}
else if($user == "$username" || $checklivv > 0) {
?>
                        <button id="gosell<?php echo $id; ?>" data-toggle="modal" data-target=".mesellit" class="btn btn-primary pull-right"><i class="fa fa-money"></i> Sell</button> 
<script>
$(document).ready(function() {
    $('#gosell<?php echo $id; ?>').click(function() {
    document.getElementById("sellrel").innerHTML = "<center><img src='./loader2.gif'></center>";     
    var sargee = "<?php echo $priceey; ?>";
    $('#selltag').val(sargee);
    var qtygee = "1";
    $('#sellqty').val(qtygee); 
    var pongee = "0706-------";
    $('#cus_no').val(pongee);  
    document.getElementById("ddatit").innerHTML="<?php echo $id; ?>";     
    var follo = "<?php echo $id; ?>";
    $.post('sellthatin.php',{follo: follo},function(data) {
        $("#sellrel").html(data);
    });
});
});
</script>  
<?php 
} else {
?>                        
<button data-toggle="modal" data-target=".logoutin" class="btn btn-primary pull-right"><i class="fa fa-cart-plus"></i> Add to cart</button>
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
        
    var follo = "<?php echo $id; ?>";
    $.post('addcart.php?U=<?php echo $uname; ?>',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowxizaz<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $id; ?>";
    $.post('removecart.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>      
                        
                        <div class="user">
                          <h6><a href="<?php echo $uname; ?>" class="profile-link"><?php echo $uname; ?></a></h6>
                          <div class="text-green"><?php echo "$vac2$price"; ?>
                          <?php 
                          if($uname == "$user"){
                          ?>
                          <a href="letrackit?term=<?php echo $tid; ?>&trad=<?php echo $id; ?>" title="See product history"><i class="fa fa-star-o"></i></a>
                          <?php 
                          }
                          ?>
                          </div>
                          <div class="pull-right">Qty: <?php echo $qteey; ?> Phone: <?php echo "$phone"; ?>
                    
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            	</div>
                                    
                                    
<?php
}
?>