<?php 
if($user != ""){
$cheztax = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$followe'");
// Count the amount of rows where username = $un
$chaxcount = $cheztax->num_rows;
?>    
    
<div id="felkax" class="pull-right">
<?php 
if ($chaxcount == 0) {
?>        
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="togglezax<?php echo $id; ?>()" style="display: none;" id="followxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="togglezax<?php echo $id; ?>()" style="display: block;" id="unfollowxizaz<?php echo $id; ?>" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
</div>
   
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
        
    var follo = "<?php echo $usename; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowxizaz<?php echo $id; ?>').click(function() {
    
    var follo = "<?php echo $usename; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#felvila").html(data);
    });
});
});
</script>    