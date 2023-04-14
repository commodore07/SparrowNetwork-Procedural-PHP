<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if(!empty($_POST['searchrefiv']) || !empty($_POST['searchpazz'])){      
$rusername = strip_tags($_POST['searchrefiv']);
$rusername = $db->real_escape_string($rusername); 
$rusername = str_replace("'", "&apos;", $rusername); 
$rusername = strtolower("$rusername");

$cusername = strip_tags($_POST['reveref']);
$cusername = $db->real_escape_string($cusername); 
$cusername = str_replace("'", "&apos;", $cusername); 
$cusername = strtolower("$cusername");

$passwod = strip_tags($_POST['searchpazz']);
$passwod = $db->real_escape_string($passwod); 
$passwod = str_replace("'", "&apos;", $passwod);  
$passwod = md5($passwod);

$get_pass = $db->query("SELECT * FROM users WHERE username='$user'");
$rollin = $get_pass->fetch_assoc();
$dbpass = $rollin['password'];
  
/////////////
$getmedver = $db->prepare("SELECT * FROM ponzee WHERE username=?") or die($db->error());
$getmedver->bind_param("s", $rusername);
$getmedver->execute();
$getmedver = $getmedver->get_result();

$infover = $getmedver->num_rows;

if($infover < 1){
    echo "Username does not exist!";
} else if ($rusername == "$cusername"){
    echo "Invalid! unable to reassign to self";
} else if($passwod != "$dbpass"){
    echo "Incorrect password!";
} else {
    $updateref = $db->prepare("UPDATE ponzee SET referee=? WHERE username=?");
    $updateref->bind_param("ss", $rusername, $cusername);
    $updateref->execute();  

    echo "Successful...";
    echo "<meta http-equiv=\"refresh\" content=\"0; url=referrals\">";
exit();
}

} else {
    echo "Fill in empty field!";
}
}
?>