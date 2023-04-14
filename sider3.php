            <div class="col-md-3">
  
              <!--Edit Profile Menu-->
              <ul class="edit-menu">
                  <li><i class="icon ion-ios-information-outline"></i><a href="my_cashflow">Dashboard</a></li>
                
                <li><i class="fa fa-users"></i><a href="referrals">Referrals</a></li>
                <?php 
                if($user == "admin" || $user == "support"){
                ?>
                <li><i class="fa fa-user"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".suppot">Add support</a></li>
                <li><i class="fa fa-users"></i><a href="support_staff">Support staffs</a></li>
                <?php 
                }
                ?>
                <li><i class="fa fa-users"></i><a href="cabal">Cabal</a></li>
                <li><i class="fa fa-money"></i><a href="ghpool">GH pool</a></li>
                <li><i class="fa fa-money"></i><a href="phpool">PH pool</a></li>
                <?php 
                if($user == "admin"){
                ?>
                <li><i class="fa fa-users"></i><a href="match_ph">Match PH</a></li>
                <li><i class="fa fa-globe"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".addcashie">Add country</a></li>
                <li><i class="fa fa-globe"></i><a href="lacoun">Countries</a></li>
                <li><i class="fa fa-money"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".regrenci">Add Currency</a></li>
                <li><i class="fa fa-bank"></i><a class="text-green" style="cursor: pointer;" data-toggle="modal" data-target=".addbankz">Add Bank</a></li>
              	<?php 
                }
                ?>
                <li><i class="fa fa-qrcode"></i><a style="cursor: pointer;" data-toggle="modal" data-target=".updateacc">Account Number</a></li>
              	
              </ul>
<div class="visible-lg">        
<?php 
$get_crite = $db->query("SELECT * FROM general_details WHERE country_spar='Nigeria'");
$rocrite = $get_crite->fetch_assoc();
$cright = $rocrite['copy_right'];
?>              
              
              <div><p style="color: #999;">Sparrow Network © <?php echo $cright; ?></p> <a style="color: #999;" href="./about">About</a> &nbsp;<a style="color: #999;" href="terms">Terms</a></div>
             
              <img width="150" src="empowa.png" />  
              
</div>
              
            </div>

