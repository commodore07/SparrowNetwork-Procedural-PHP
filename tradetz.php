<?php include "php/connectit.php"; ?>
<?php include("user_script.php"); ?>

<?php include("ago.php"); ?>

<?php 

$ided = $_GET['I'];
$ided = $db->real_escape_string($ided); 
$ided = str_replace("'","&apos;", $ided);

$post = strip_tags($_POST['post']);
$post = $db->real_escape_string($post); 
$post = str_replace("'", "&apos;", $post);

/////////////////////////
$getpst = $db->query("SELECT * FROM posts WHERE vee1='$ided'" ) or die($db->error());
while ($row = $getpst->fetch_assoc()) {
						$id = $row['id'];
						$body = $row['body'];
                                                $artteez = substr($body, 0, 250);
                                                $boddie = $row['body'];
                                                $vee2 = $row['vee2'];
                                                $boddie = str_replace("#", "", $boddie);
                                                $leetube = $row['youtube_url'];
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
                                                $hashlee = $row['hashtag'];
                                                $hashaz = $row['hash_id'];
                                                if($hashaz != ""){
                                                $pub_time = time_ago($hashaz);
                                                } else {
                                                    $pub_time = "";
                                                }
                                                
//Get Relevant Comments
$get_comments = $db->query("SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id ASC");
$count = $get_comments->num_rows;                                                
                                                
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
                                                    
                                                 $pazzy = "<center><img style='max-width: 100%;' src='$pazz' alt='post-image' class='img-rounded' /></center>";   
                                                    
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
else {
    $lazstax = "Published a chirp";
}
?> 
 




<!-- Post Content
            ================================================= -->
            
              
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
                  <div class="line-divider"></div>
                  
<?php 
if($leetube == ""){
?>                  
                  <?php echo $pazzy; ?>
<?php 
}
?>                  

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
                        <div style="padding: 10px;">
                            <div>Product name: <?php echo $leename; ?></div>
                            <div class="text-green">Price: <?php echo "$vac2$leeprice"; ?></div>
                            <div class="pull-right">Chasis: <?php echo "$leechas"; ?></div> 
                            <div>Category: <?php echo $leecat; ?></div> 
                          <div class="pull-right">Qty: <?php echo $leeitqty; ?> &nbsp; <i class="fa fa-phone"></i> <?php echo $leephone; ?> </div>
                        </div>    
<?php 
}
?>    

<p style="margin: 10px;"> <?php echo $body; ?> </p> 
   
              </div>                                             
<?php
}
?>

<?php
if($count > 10){
include("view_comets.php");
}
?>

                  
