<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
 
<?php 
$post = strip_tags($_POST['sarchword']);
$post = $db->real_escape_string($post); 
$tino = time();
if ($post != "") {
/////////// Search Query Begins
$getinftee = $db->prepare("SELECT * FROM users WHERE username = ? LIMIT 1" ) or die($db->error());
$getinftee->bind_param("s", $post);
$getinftee->execute();
$getinftee = $getinftee->get_result();

$roz = $getinftee->fetch_assoc();
$unom = $roz['username'];
$fnom = $roz['fullname'];     
?>              
<a class="text-green"><?php echo $fnom; ?></a>

<?php 
}
?>