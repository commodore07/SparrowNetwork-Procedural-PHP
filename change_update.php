<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
 $firstname = strip_tags(@$_POST['firstname']);
    $firstname = $db->real_escape_string($firstname); 
   $rel = strip_tags($_POST['occ']);
   $rel = $db->real_escape_string($rel); 
   $occ = strip_tags($_POST['dat']);
   $occ = $db->real_escape_string($occ); 
   $con = strip_tags($_POST['mmn']);
   $con = $db->real_escape_string($con); 
   $phon = strip_tags($_POST['phon']);
   $phon = $db->real_escape_string($phon); 
   $mailee = strip_tags($_POST['mailee']);
   $mailee = $db->real_escape_string($mailee); 
   $abt_me = strip_tags($_POST['abt_me']);
   $abt_me = $db->real_escape_string($abt_me); 

if ($user != "") {


   if (strlen($firstname) < 5) {
    echo "Your fullname must be more than 5 characters long.";
   }
   
   else
   {
    //Submit the form to the database
    $info_submit_query = $db->prepare("UPDATE users SET fullname=?, religion=?, occupation=?,country=?,phone=?, email=?,about_me=? WHERE username='$user'");
    $info_submit_query->bind_param("sssssss", $firstname, $rel, $occ, $con, $phon, $mailee, $abt_me);
    $info_submit_query->execute();
    
    echo "Information updated!";
   }
  }
  else
  {
   echo "you are not logged in...";
  }


?>