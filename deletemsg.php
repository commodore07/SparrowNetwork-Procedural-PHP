<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 
 $foll_val = str_replace("'", "&apos;", $foll_val);

if ($user != "") {

    $db->query("DELETE FROM my_chat WHERE sender = '$user' AND receiver= '$foll_val' OR sender = '$foll_val' AND receiver= '$user'");
    $db->query("DELETE FROM msg_reply WHERE sender = '$user' AND receiver= '$foll_val' OR sender = '$foll_val' AND receiver= '$user'"); 
    
    echo "Deleted";
  }
  else
  {
   /// do nothing...
  }


?>