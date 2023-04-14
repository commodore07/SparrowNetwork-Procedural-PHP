<?php 
if($user != "" && $user != "$username"){
$checkee = $db->query("SELECT * FROM follows WHERE follower='$user' && followe='$username'");
// Count the amount of rows where username = $un
$checkvaz = $checkee->num_rows;
?>    
    <center>
    <div id="feltez">
<?php 
if ($checkvaz == 0) {
?>        
    <button onclick="latoggle()" style="display: block;" id="lafollit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="latoggle()" style="display: none;" id="unlafollit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="latoggle()" style="display: none;" id="lafollit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="latoggle()" style="display: block;" id="unlafollit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
    </div>
    </center>
<?php 

}

?>

<script language="javascript">
         function latoggle() {
           var ele = document.getElementById("lafollit");
           var ble = document.getElementById("unlafollit");
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
    $('#lafollit').click(function() {
        
    var follo = "<?php echo $username; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unlafollit').click(function() {
    
    var follo = "<?php echo $username; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>