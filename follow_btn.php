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
    <button onclick="toggle()" style="display: block;" id="followit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="toggle()" style="display: none;" id="unfollowit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
else {
?>    
    <button onclick="toggle()" style="display: none;" id="followit" class="btn-primary"><i class="fa fa-user-plus"></i> Follow</button>
    <button onclick="toggle()" style="display: block;" id="unfollowit" class="btn-primary"><i class="fa fa-user-circle-o"></i> Unfollow</button>
<?php 
}
?>    
    </div>
    </center>
<?php 

}

?>

<script language="javascript">
         function toggle() {
           var ele = document.getElementById("followit");
           var ble = document.getElementById("unfollowit");
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
    $('#followit').click(function() {
        
    var follo = "<?php echo $username; ?>";
    $.post('followme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>

<script>
$(document).ready(function() {
    $('#unfollowit').click(function() {
    
    var follo = "<?php echo $username; ?>";
    $.post('unfollowme.php',{follo: follo},function(data) {
        $("#feltejz").html(data);
    });
});
});
</script>