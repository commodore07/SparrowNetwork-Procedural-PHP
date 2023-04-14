<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?>


<?php
///// Count unread chats
                            $get_nexie = $db->query("SELECT * FROM msg_reply WHERE receiver = '$user' AND emp1 != 'seen'");
                            $canexie = $get_nexie->num_rows; 
if($canexie == 0){
    $caveekie = "";
}
else {
    $caveekie = "<span class='messagesk'>$canexie</span>";
}
                            ///////// End count 
 ?>

<?php echo "$caveekie"; ?>