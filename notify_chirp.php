<!DOCTYPE html>
<html lang="en">
	
<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>


<?php 
if (isset($_GET['u'])) {
	$username = $db->real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = $db->query("SELECT username FROM users WHERE username='$username'");
	if ($check->num_rows===1) {
	$get = $check->fetch_assoc();
	$username = $get['username'];
	}
	else
	{
            echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";
	exit();
	}
	}
$username = str_replace("'","&apos;", $username);        
}
?>
    
<?php
$temex = $_GET['term'];
$temex = $db->real_escape_string($temex); 
$temex = str_replace("'","&apos;", $temex);
?>       

<?php

$getposts = $db->query("SELECT * FROM posts WHERE id = '$temex' OR seo_friendly='$temex'" ) or die($db->error());
$conxado = $getposts->num_rows;
if($conxado != 0){
    
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";
	exit();
}
////
while ($row = $getposts->fetch_assoc()) {                                
$id = $row['id'];
$boddie = $row['body'];
$boddie = str_replace("#", "", $boddie);
$boddie = substr($boddie, 0, 150);
$boddie = "$boddie...";
$pazz = $row['profile'];
$comeadme = $row['added_by'];
$tizzo = $row['empty2'];
if($tizzo != ""){
    $latixa = "$tizzo";
} else {
    $latixa = "WELCOME TO SPARROW NETWORK";
}
}
?>   

    
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo $boddie; ?>" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
                
<!-- Facebook Open Graph tags -->
    <meta property="og:image" content="http://sparrownetwork.net/<?php echo $pazz; ?>" />
    <meta property="og:site_name" content="Sparrow Network" />
    <meta property="og:type" content="image" />
    <meta property="og:url" content="www.sparrownetwork.net" />
    <meta property="og:title" content="<?php echo $latixa; ?>" />
    <meta property="og:description" content="<?php echo $boddie; ?>" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:creator" content="">
    <meta name="twitter:url" content="www.sparrownetwork.net" />
    <meta name="twitter:title" content="<?php echo $latixa; ?>" />
    <meta name="twitter:description" content="<?php echo $boddie; ?>" />
    <meta name="twitter:image:src" content="http://sparrownetwork.net/<?php echo $pazz; ?>" />                
                
<?php 
$get_xoa = $db->query("SELECT * FROM users WHERE username='$user'");
$roloa = $get_xoa->fetch_assoc();
$fnoa = $roloa['fullname'];

if($user == ""){
    $titixiz = "Sparrow Network";
}
else {
    $titixiz = "$fnoa";
}
?>                
		<title><?php echo $latixa ?></title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popit.css" />
    <link href="css/chat.css" rel="stylesheet">
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <script src="js/jquery.js"></script>
</head>

<?php 
$info = 0;
?>
  
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('total_view.php',{post: post});
});
</script>  
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
<div class="col-md-3 static">
<?php 
if($user != ""){
?>    
            <div class="profile-card">
            	<img src="<?php echo $propind; ?>" alt="user" class="profile-photo" />
            	<h5><a href="./<?php echo $user; ?>" class="text-white"><?php echo $flevind; ?></a></h5>
            	<a href="followers?u=<?php echo $user; ?>" class="text-white"><i class="ion ion-android-person-add"></i> <?php echo $fozcaz; ?> </a>
            </div><!--profile card ends-->
<?php 
}
?>            
<div class="visible-lg">            
<?php 
$date_added = date("Y-m-d");
$getboax = $db->query("SELECT * FROM hash_tag WHERE date_created = '$date_added' AND hash_word != 'none'" ) or die($db->error());
$countboa = $getboax->num_rows;
if($countboa  > 0){
?>            
            <h4 style="margin-left: 20px;" class="grey">Trends</h4>
            <ul class="nav-news-feed">
<?php 
$getinftie = $db->query("SELECT * FROM hash_tag WHERE date_created = '$date_added' AND hash_word != 'none' ORDER BY hash_num DESC LIMIT 5" ) or die($db->error());
while ($roz = $getinftie->fetch_assoc()) {
                                                $hashwoz = $roz['hash_word'];
?>                
                <li><i class="fa fa-hashtag text-green"></i><div><a href="hashtag?term=<?php echo $hashwoz; ?>"><?php echo $hashwoz; ?></a></div></li>
<?php 
}
?>              
            </ul><!--news-feed links ends-->
<?php 
}
?> 
</div>            
     
             
            
            <div class="visible-lg" style="margin-top: 10px;" id="chat-block">
              <div class="title">Who to know</div>
              <ul class="online-users list-inline">
                  
<?php 
$getinftie = $db->query("SELECT * FROM users WHERE username != '$user' ORDER BY RAND() LIMIT 9" ) or die($db->error());
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
              <hr>
              <div><p style="color: #999;">Sparrow Network © 2018</p> <a style="color: #999;" href="./about">About</a> &nbsp;<a style="color: #999;" href="terms">Terms</a></div>
              
            </div><!--chat block ends-->
            
          </div>		
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
            
<div>                             
<?php 
$getposts = $db->prepare("SELECT * FROM posts WHERE id=? OR seo_friendly=?" ) or die($db->error());
$getposts->bind_param("ss", $temex, $temex);
$getposts->execute();
$getposts = $getposts->get_result();
?>
<?php 
while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
                                                $seofriend = $row['seo_friendly'];
                                                if($seofriend == ""){
                                                    $thelink = "$id";
                                                } else {
                                                    $thelink = "$seofriend";
                                                }
						$body = $row['body'];
                                                $body = nl2br("$body");
                                                $artteez = substr($body, 0, 250);
                                                if (strlen($body) > 249) {
                                                    $body = "$body";
                                                }
                                                else {
                                                    $body = "$body";
                                                }
                                                $boddie = $row['body'];
                                                $vee2 = $row['vee2'];
                                                $boddie = str_replace("#", "", $boddie);
                                                $leetube = $row['youtube_url'];
                                                $adcod = $row['emp1'];
						$date_added = $row['date_added'];
                                                $artu = substr($boddie, 0, 110);
                                                $artu = "$artu...";
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];
						if($date_added != ""){
                                                $ago_time = time_ago($date_added);
                                                } else {
                                                    $ago_time = "";
                                                }
						$pazz = $row['profile'];
						$sharee = $row['sharee'];
						$kuzz = $row['emp2'];
                                                $kuzzie = $row['emp1'];
                                                $empty1 = $row['empty1'];
                                                $vizzy = $row['vee1'];
                                                $empty2 = $row['empty2'];
                                                $hashlee = $row['hashtag'];
                                                ////////////// Reduce share text
                                                $shareelee = substr($hashlee, 0, 230);
                                                if (strlen($hashlee) > 229) {
                                                    $hashlee = "$shareelee...";
                                                }
                                                else {
                                                    $hashlee = "$hashlee";
                                                }
                                                ///////////// End reduce share text
                                                $hashaz = $row['hash_id'];
                                                if($hashaz != ""){
                                                $pub_time = time_ago($hashaz);
                                                } else {
                                                    $pub_time = "";
                                                }
                                                
if(file_exists($pazz) && $pazz != ""){
    $pazz = "$pazz";
}
else if(!file_exists($pazz) && $pazz != "") {
    $pazz = "deleted.jpg";
}
else {
    $pazz = "";
}
                                                
$getinf = $db->query("SELECT * FROM users WHERE username='$added_by' ORDER BY id DESC LIMIT 1" ) or die($db->error());
while ($roz = $getinf->fetch_assoc()) {
    
                                                $fname = $roz['fullname'];
    
}                                                
                                                                               
                                                if ($pazz == "") {
                                                 $pazzy = "";
                                                }
                                                else
                                                {
                                                    
                                                 $pazzy = "<center><img style='max-width: 100%;' src='$pazz' alt='post-image' class='img' /></center>";   
                                                    
                                                }
						
						$get_user_info = $db->query("SELECT * FROM users WHERE username='$added_by'");
                                                $get_info = $get_user_info->fetch_assoc();
                                                $profilepic_info = $get_info['profilecrop_pic'];
                                                if ($profilepic_info == "") {
                                                 $profilepic_info = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $profilepic_info = "$profilepic_info";
                                                }
                                                
      ?>

<?php include("tag.php"); ?>						
 
<?php 
if($empty1 == "profilepic"){
    $lazstax = "Updated profile photo";
}
else if ($empty1 == "backgroundpic"){
    $lazstax = "Updated background photo";
}
else if($empty1 == "share"){
    $lazstax = "Shared @<a href='$sharee'>$sharee</a>'s chirp";
}
else if($empty1 == "tradefairpic"){
    $lazstax = "Added product on tradefair *<a href='./$added_by.trade'>$added_by</a>";
}
else if($empty2 != ""){
    $lazstax = "$empty2";
}
else {
    $lazstax = "Published a chirp";
}
?>

<?php 
$get_noq = $db->query("SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC LIMIT 10");
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
    document.getElementById("id_nox").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("added_nox").innerHTML="<?php echo $added_by; ?>";
    document.getElementById("timazzoq").innerHTML="<?php echo $timenoq; ?>";     
    $.post('commetz.php?I=<?php echo $id; ?>',{post: fn},function(data) {       
        //// Profile pic small
        var comid = "<?php echo $id; ?>";
        $.post('cheezi2.php',{comid: comid},function(data) {   
	$("#magic").html(data);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $id; ?>";
        $.post('chivtime.php',{chiv: chiv},function(data) {   
	$("#timazzoq").html(data);
        });
        ///// end 
        $("#kinalee").html(data);
                        
    });
});
});
</script>   

<script>   
$(document).ready(function() {
    $('#seemorez<?php echo $id; ?>').click(function() {
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
    document.getElementById("id_nox").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("added_nox").innerHTML="<?php echo $added_by; ?>";
    document.getElementById("timazzoq").innerHTML="<?php echo $timenoq; ?>";     
    $.post('commetz.php?I=<?php echo $id; ?>',{post: fn},function(data) {       
        //// Profile pic small
        var comid = "<?php echo $id; ?>";
        $.post('cheezi2.php',{comid: comid},function(data) {   
	$("#magic").html(data);
        });
        ///// end 
        //// Get comment time
        var chiv = "<?php echo $id; ?>";
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
		var url = "share.php?I=<?php echo $id; ?>";
		var fn = "<?php echo $id; ?>";
   	    var vars = "post="+fn;
		hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
            document.getElementById("id_vee").innerHTML="<?php echo $id; ?>"; 
            document.getElementById("added_vee").innerHTML="<?php echo $added_by; ?>";
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("kinvee").innerHTML = return_data;
	    }
    }
    hr.send(vars);
    document.getElementById("kinvee").innerHTML = "<center><img src='./loader2.gif'></center>";
}
</script>

<!-- Post Content
            ================================================= -->
            <div class="post-content">  
<?php 
if($adcod == "adsense"){
?> 
  <?php include("adcode.php"); ?>           
<?php 
}
?>                
              <div class="post-container">
                  
                <img src="<?php echo $profilepic_info; ?>" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                      <h5><a href="./<?php echo $added_by; ?>" class="profile-link"><?php echo $fname; ?></a> <span class="following">@<a class="text-green" href="./<?php echo $added_by; ?>"><?php echo $added_by; ?></a></span></h5>
                    <p class="text-muted"><?php echo $lazstax; ?></p>
                  </div>
                  <div class="reaction">
                    
                    <div class="text-green"><i class="fa fa-clock-o"></i> <?php echo $ago_time; ?> ago</div>
                  </div>
                </div>
                  
                  
              </div>
<div style="padding: 0px;">    
<?php 
if($leetube == ""){
?>                  
                  <?php echo $pazzy; ?>
<?php 
}
?> 
                

<?php 
if($leetube != ""){
?>
<div class="video-indent">
						<div class="myvideo">
							<iframe src="https://www.youtube.com/embed/<?php echo $leetube; ?>?rel=0"></iframe>
						</div>
					</div>
<?php 
}
?> 
</div>
<div class="post-container">
<?php 
$idee = $db->query("SELECT * FROM users WHERE username='$added_by'") or die($db->error());
$row = $idee->fetch_assoc();
$vac1 = $row['vac1'];
$vac2 = $row['vac3'];
$leephone = $row['phone'];
if($leephone == ""){
    $leephone = "Secret";
} else {
    $leephone = "$leephone";
}
?>    
    
<?php 
$get_photnaz = $db->query("SELECT * FROM tradefair WHERE brand='$vizzy' AND username='$added_by'");
$rollinx = $get_photnaz->fetch_assoc();
$leecat = $rollinx['category'];
$leechas = $rollinx['chasis'];
$leename = $rollinx['name'];
$leeprice = $rollinx['price'];
$leeprice = number_format($leeprice);
$leeitqty = $rollinx['item_qty'];

if($empty1 == "tradefairpic"){
?> 
                        <div style="padding-left: 20px;">
                            <div>Product name: <?php echo $leename; ?></div>
                            <div class="text-green">Price: <?php echo "$vac2$leeprice"; ?></div>
                            <div class="pull-right">Chasis: <?php echo "$leechas"; ?></div> 
                            <div>Category: <?php echo $leecat; ?></div> 
                            <div class="pull-right">Qty: <?php echo $leeitqty; ?> &nbsp; <i class="fa fa-phone"></i> <?php echo $leephone; ?> </div>
                        </div>    
<?php 
}
?>    
    <p style="color: #000; margin: 10px;"> <?php echo $body; ?> </p>
    
    <?php
$getmozex = $db->query("SELECT * FROM imgz WHERE photo_id='$vee2'") or die($db->error());
$infezex = $getmozex->num_rows;
?>
    
<div style="padding: 0px;">   
<?php 
if($infezex > 0){
?>

<div style="font-size: 14px; text-align: center; margin-bottom: 10px;">More photos</div>
                  
<?php 
$getimgz = $db->query("SELECT * FROM imgz WHERE photo_id='$vee2'" ) or die($db->error());
while ($row = $getimgz->fetch_assoc()) {
						$lamage = $row['image'];
?>
                  <center>
                      <div style="margin-bottom: 10px;">
                          <img src="<?php echo $lamage; ?>" style="max-width: 100%;" class="img">
                      </div>
                  </center>
<?php                  
}
?> 

<?php 
}
?>
</div>    

<div class="line-divider"></div>
<?php 
$get_sharee = $db->query("SELECT * FROM users WHERE username='$sharee'");
$rolee = $get_sharee->fetch_assoc();
$fleexa = $rolee['fullname'];
$propixa = $rolee['profilecrop_pic'];
if($propixa == ""){
    $propixa = "./img/default_pic2.jpg";
}
else {
    $propixa = "$propixa";
}
?>                  
<?php 
if($empty1 == "share"){
?>                  
                  
                <div class="post-detail">
                    <img style="margin-right: 10px;" src="<?php echo $propixa; ?>" alt="user" class="profile-photo-sm pull-left" />
                  <div class="user-info">
                      <h5><a href="./<?php echo $sharee; ?>" class="profile-link"><?php echo $fleexa; ?></a> <span class="following">@<a class="text-green" href="./<?php echo $sharee; ?>"><?php echo $sharee; ?></a></span></h5>
                    <p class="text-muted">Published <?php echo $pub_time; ?> ago</p>
                  </div>
                  
                  <div class="post-comment">
                    
                    <p><?php echo $hashlee; ?></p>
                  </div>
                </div>
<?php 
}
?> 
<?php 
//////// Share Count
$sheerit = $db->query("SELECT * FROM share WHERE like_id = '$id'");
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
$likepost = $db->query("SELECT * FROM likes WHERE liker='$user' && likee='$added_by' && like_id = '$id'");
// Count the amount of rows where username = $un
$likecount = $likepost->num_rows;
//// Like count
$likit = $db->query("SELECT * FROM likes WHERE like_id = '$id'");
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
        
    var follo = "<?php echo $id; ?>";
    $.post('like.php?U=<?php echo $added_by; ?>',{follo: follo},function(data) {
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
    
    var follo = "<?php echo $id; ?>";
    $.post('unlike.php?U=<?php echo $added_by; ?>',{follo: follo},function(data) {
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


                <div> 
                  <ul class="list-inline social-icons">
                      
<?php
if($user != ""){                    
?>
<li>                      
<a onClick="shareit<?php echo $id; ?>()" style="cursor: pointer;" data-toggle="modal" data-target=".sharoll" title="Reply chirp"><i class="fa fa-share-square-o"></i></a>
</li>
<?php 
} else {
?>
<li>
<a title="Reply chirp" data-toggle="modal" style="cursor: pointer;" data-target=".logoutin"><i class="fa fa-share-square-o"></i></a> 
</li>
<?php
}
?>                      
                      
                    <li><a target="_blank" href="https://web.facebook.com/sharer/sharer.php?u=http://sparrownetwork.net/<?php echo $thelink; ?>.html&text=<?php echo $boddie; ?>" title="Share on facebook"><i class="icon ion-social-facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/share?url=http://sparrownetwork.net/<?php echo $thelink; ?>.html&text=<?php echo $artu; ?>" title="Share on twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" href="whatsapp://send?text=http://sparrownetwork.net/<?php echo $thelink ?>.html" title="Share on whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                  
                                        
<?php 
if($added_by == "$user"){
?>                    
<script language="javascript">
         function metoggle<?php echo $id; ?>() {
           var ele = document.getElementById("togit<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = 'none';
           }
           else
           {
             ele.style.display = 'block';
           }
         }
</script>  
<li><a style="cursor: pointer;" onclick="metoggle<?php echo $id; ?>()" title="More options" ><i class="fa fa-ellipsis-h"></i></a></li>
                   
                    <div id="togit<?php echo $id; ?>" class="panel-collapse collapse">
                        <div class="line-divider"></div>
                        
<script>
$(document).ready(function() {
    $('#laedits<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $id; ?>";
    var emm1 = "<?php echo $empty1; ?>";
    $.post('editit.php',{follo: follo, emm1: emm1},function(data) {
        $("#editrel").html(data);
    });
});
});
</script>                          
                        
                        <p style="padding-left: 10px;">
    <span id="laedits<?php echo $id; ?>" class="text-green" data-toggle="modal" data-target=".gogetit" style="cursor: pointer;">
        <i class="fa fa-pencil"></i>
        Edit Chirp
    </span> 
</p> 
                        
                        <div class="settings-block">
                    <div class="row">
                      <div class="col-sm-9">
                        <div class="switch-description">
                          <div><strong>Enable delete</strong></div>
                          <p>Enable this if you want to delete this chirp</p>
                        </div>
                      </div>
                        <div class="col-sm-3">
                        <div class="toggle-switch">
                          <label id="delstat<?php echo $id; ?>" class="switch">
                           

<input id="follow_activ<?php echo $id; ?>" type="checkbox">

                            <span class="slider round"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                      
<script>
$(document).ready(function() {
    $('#follow_activ<?php echo $id; ?>').click(function() {
    var foll_val = "<?php echo $id; ?>";
    $.post('delete.php',{foll_val: foll_val},function(data) {
        $("#delstat<?php echo $id; ?>").html(data);
    });
});
});
</script>
                      
                  </div> 
                        
                    </div>
                
<?php 
}
?>                
                  
<?php 
$commkit = $db->query("SELECT * FROM post_comments WHERE post_id = '$id'");
// Count the amount of comments
$comzee = $commkit->num_rows;
if ($comzee == 0){
    $comstatu = "Post a comment";
}
else if($comzee == 1){
    $comstatu = "1 comment";
}
else {
    $comstatu = "$comzee comments";
}

?>                    
                    <a id="comments<?php echo $id; ?>" data-toggle="modal" data-target=".comments" title="View all comments" class="btn text-blue"><?php echo $comstatu; ?></a>
                </ul>
                </div>  
                </div>
                  
              </div>
            </div>
                                                
<?php
}
?>
    
</div> 

<h4 class="grey">Related Chirps</h4>   

<div id="images" class="images">                             
<?php 
$getmag = $db->query("SELECT * FROM posts WHERE added_by='$comeadme' ORDER BY id DESC") or die($db->error());
$info = $getmag->num_rows;

$getposts = $db->query("SELECT * FROM posts WHERE added_by='$comeadme' ORDER BY id DESC LIMIT 10" ) or die($db->error());
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
                         $.post("ajax_related.php?U=<?php echo $comeadme; ?>",{load:loadclick},function(data){
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
