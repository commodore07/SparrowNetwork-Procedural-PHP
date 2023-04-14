<?php 
while ($roz = $getposts->fetch_assoc()) {
    
                                                $unom = $roz['username'];
                                                $fnom = $roz['fullname'];
                                                $gend = $roz['gender'];
                                                $prof_pic = $roz['profilecrop_pic'];
                                                if($prof_pic == ""){
                                                    $prof_pic = "./img/default_pic2.jpg";
                                                }
                                                else {
                                                    $prof_pic = "$prof_pic";
                                                }
                                                $coun = $roz['country'];
                                                $rel = $roz['religion'];
                                                $back_pic = $roz['backgroundcrop_pic'];
                                                /// Profile pic Begins
                                                if ($back_pic == "") {
                                                    $back_pic="img/backgroundcrop_pic.jpg";
                                                }
                                                else{
                                                    $back_pic="$back_pic";
                                                }
                                                /// Profile pic Ends
                                                   
?>              
              
                <div class="col-md-6 col-sm-6">
                    <div class="friend-card">
                      <img src="<?php echo $back_pic; ?>" alt="profile-cover" class="img-responsive cover" />
                      <div class="card-info">
                        <img src="<?php echo $prof_pic; ?>" alt="user" class="profile-photo-lg" />
                        <div class="friend-info">
                          <a href="./<?php echo $unom; ?>" class="pull-right text-green">View profile</a>
                          <h5><a href="./<?php echo $unom; ?>" class="profile-link"><?php echo $fnom; ?></a></h5>
                          <p><?php echo $coun; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
              
         
<?php 
}
?>