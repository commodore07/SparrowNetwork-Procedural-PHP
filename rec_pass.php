<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $recuse = strip_tags(@$_POST['recuse']);
 $recuse = $db->real_escape_string($recuse); 
 $recuse = str_replace("'", "&apos;", $recuse);
 
 $recmail = strip_tags(@$_POST['recmail']);
 $recmail = $db->real_escape_string($recmail); 
 $recmail = str_replace("'", "&apos;", $recmail);
 
 $date_added = date("Y-m-d");
 $timm = time();
 
 //////////
$get_phot = $db->prepare("SELECT * FROM users WHERE username=? AND email=?");
$get_phot->bind_param("ss", $recuse, $recmail);
$get_phot->execute();
$get_phot = $get_phot->get_result();

$inconv = $get_phot->num_rows;
$rollin = $get_phot->fetch_assoc();
$bpazz = $rollin['password'];
$bmaizz = $rollin['email'];
$passxix = substr($bpazz, 0, 10); 
 /////////

if($inconv > 0){
$uniqcode = "$timm.$date_added.$passxix"; 

//Submit the form to the database
    $info_submit_query = $db->prepare("UPDATE users SET noteen1=? WHERE username=? AND email=?");
    $info_submit_query->bind_param("sss", $uniqcode, $recuse, $recmail);
    $info_submit_query->execute();
    
// Email Script
$emailo = "$bmaizz";
$subolo = "Password Reset";
$mailbod = "This mail was sent to you on request. Kindly click on the password reset link below to change your sparrow network password. If you did'nt request for this mail, you can kindly ignore.<br>http://sparrownetwork.com/changemenow?code=$uniqcode";
include("email_script.php");    
    
    echo "A password reset link was sent to $bmaizz";
} else {
    echo "No match found...";
}
   
?>