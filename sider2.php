<style>
    #fico {
        margin-top: 100px;
    }
    @media(max-width:768px) {
    #fico {
        margin-top: 150px;
    }
}
</style>

<div id="fico" class="col-md-3 static">
            
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