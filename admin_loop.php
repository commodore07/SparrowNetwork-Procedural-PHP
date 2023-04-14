<?php 
while ($roz = $getinfteef->fetch_assoc()) {
    $id = $roz['id'];
    $unex = $roz['username'];
    $uni = $roz['vac3'];
    $maix = $roz['email'];
    $genx = $roz['gender'];
    $counx = $roz['country'];
    $fulnam = $roz['fullname'];
    $pcrop = $roz['profilecrop_pic'];
    if($pcrop == ""){
        $pcrop = "./img/default_pic.jpg";
    }
    else {
        $pcrop = "$pcrop";
    }

?> 

<script>
$(document).ready(function() {
    $('#comments<?php echo $id ?>').click(function() {
    document.getElementById("addsez").innerHTML = "<center><img src='./loader2.gif'></center>";    
    var follo = "<?php echo $id; ?>";
    $.post('adset.php?UN=<?php echo $unex; ?>',{follo: follo},function(data) {
        $("#addsez").html(data);
    });
});
});
</script>  

                    <li id="comments<?php echo $id; ?>" data-toggle="modal" data-target=".adminedit">
                      <a href="#contact-1" data-toggle="tab">
                        <div class="contact">
                        	<img src="<?php echo $pcrop; ?>" alt="" class="profile-photo-sm pull-left"/>
                        	<div class="msg-preview">
                        		<h6><?php echo "<b>$fulnam</b> @$unex"; ?></h6>
                        		<p class="text-muted"><?php echo $maix; ?></p>
                                        <small class="text-muted"><?php echo $genx; ?></small>
                                        <div id="cleartz<?php echo $id; ?>"><?php echo $counx; ?></div>
                        	</div>
                        </div>
                      </a>
                    </li>
         
<?php 
}
?>