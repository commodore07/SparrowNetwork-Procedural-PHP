<?php 
$reever = "support";
$receiver = "support";

?>
<script>
$(document).ready(function() {
    $('#deqadmin<?php echo $id; ?>').click(function() {
    var repmsg = "Fake POP? report @<?php echo $followe; ?> to SPARROW ADMIN else, exit chat room";
    document.getElementById("terqoi").innerHTML=repmsg;    
    document.getElementById("terminaqoi").innerHTML="<?php echo $receiver; ?>"; 
    document.getElementById("casexid").innerHTML="<?php echo $id; ?>"; 
    document.getElementById("requoqoi").innerHTML = "<center><img src='./loader2.gif'></center>";      
    var rezqooi = "<?php echo $id; ?>";
    $.post('conf_disp.php',{rejid: rezqooi},function(data) {
        $("#requoqoi").html(data);
    });
});
});
</script>     
<a id="deqadmin<?php echo $id; ?>" title="Send a private message" class="text-red pull-right" style="cursor: pointer;" data-toggle="modal" data-target=".privmessage">Report pop</a>
