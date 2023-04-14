<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php 
$follo = strip_tags(@$_POST['follo']);
$follo = $db->real_escape_string($follo); 
 $follo = str_replace("\'", "&apos;", $follo);
 
$ladez = strip_tags(@$_POST['ladez']);
 $ladez = str_replace("\'", "&apos;", $ladez); 
 
if ($user != "") {
$updat = $db->prepare("UPDATE posts SET body=? WHERE id=?");
$updat->bind_param("ss", $ladez, $follo);
$updat->execute();

echo "Update was successful";
}
?>



