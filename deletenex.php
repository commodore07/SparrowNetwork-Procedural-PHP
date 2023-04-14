<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>


<?php 
 $foll_val = strip_tags(@$_POST['foll_val']);
 $foll_val = $db->real_escape_string($foll_val); 
 $foll_val = str_replace("'", "&apos;", $foll_val);

if ($user != "") {

    $db->query("DELETE FROM notify WHERE event_id = '$foll_val'");
    $db->query("DELETE FROM notifications WHERE event_id = '$foll_val'"); 
    
    echo "Deleted";
  }
  else
  {
   /// do nothing...
  }


?>