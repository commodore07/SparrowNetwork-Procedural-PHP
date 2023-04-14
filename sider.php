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
$getboax = $db->query("SELECT * FROM hash_tag WHERE date_created = '$date_added' AND hash_word != 'none' AND hash_word !=''" ) or die($db->error());
$countboa = $getboax->num_rows;
if($countboa  > 0){
?>            
            <h4 style="margin-left: 20px;" class="grey">Trends</h4>
            <ul class="nav-news-feed">
<?php 
$getinftie = $db->query("SELECT * FROM hash_tag WHERE date_created = '$date_added' AND hash_word != 'none' AND hash_word !='' ORDER BY hash_num DESC LIMIT 5" ) or die($db->error());
while ($roz = $getinftie->fetch_assoc()) {
                                                $hashwoz = $roz['hash_word'];
?>                
                <li><i class="fa fa-hashtag text-green"></i>
                    <div>
                        <a style="font-size: 17px; font-weight: 700;" href="hashtag?term=<?php echo $hashwoz; ?>"><?php echo $hashwoz; ?>
                        </a>
                        
                    </div>
                </li>
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
              
<?php 
$get_crite = $db->query("SELECT * FROM general_details WHERE country_spar='Nigeria'");
$rocrite = $get_crite->fetch_assoc();
$cright = $rocrite['copy_right'];
?>              
              
              <div><p style="color: #999;">Sparrow Network © <?php echo $cright; ?></p> <a style="color: #999;" href="./about">About</a> &nbsp;<a style="color: #999;" href="terms">Terms</a></div>
             
              <img width="150" src="empowa.png" />
              
            </div><!--chat block ends-->
            
          </div>