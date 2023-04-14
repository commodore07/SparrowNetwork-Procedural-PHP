<?php 
while ($roz = $getinftee->fetch_assoc()) {
    
                                                $lanom = $roz['username'];
                                                $laev = $roz['commte'];
                                                $latim = $roz['time_added'];
                                                $cashtex = $roz['cashier'];
                                                $datim = $roz['date_added'];
                                                $id = $roz['id'];
                                                $nostx = $roz['la_qty'];
                                                $nostx = number_format($nostx);
                                                
$getinfteef = $db->query("SELECT * FROM users WHERE username='$cashtex'" ) or die($db->error());
while ($roz = $getinfteef->fetch_assoc()) {
    $uni = $roz['vac3'];
    $fulnam = $roz['fullname'];
    $pcrop = $roz['profilecrop_pic'];
    if($pcrop == ""){
        $pcrop = "./img/default_pic.jpg";
    }
    else {
        $pcrop = "$pcrop";
    }
}

if($laev == "remove"){
    $lastaxiz = "Removed from shelve";
}
else if($laev == "return"){
    $lastaxiz = "Returned to shelve";
} else if($laev == "xaupdate"){
    $lastaxiz = "Updated shelve";
}  
?> 

                    <li>
                      <a href="#contact-1" data-toggle="tab">
                        <div class="contact">
                        	<img src="<?php echo $pcrop; ?>" alt="" class="profile-photo-sm pull-left"/>
                        	<div class="msg-preview">
                        		<h6><?php echo "$fulnam "; ?></h6>
                                        <p class="text-muted"><?php echo $lastaxiz; ?> &nbsp;&nbsp;<span class="text-green"><i class="fa fa-clock-o"></i> <?php echo $latim; ?></span></p>
                                        <small class="text-muted"><?php echo $datim; ?> </small>
                                        <div class="chat-alert"><?php echo $nostx; ?></div>
                        	</div>
                        </div>
                      </a>
                    </li>
         
<?php 
}
?>