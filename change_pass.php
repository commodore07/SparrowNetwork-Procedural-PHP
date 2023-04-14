<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>

<?php 
if($user != ""){
  //Password variables
  $old_password = strip_tags($_POST['old_pass']);
  $new_password = strip_tags($_POST['new_pass']);
  $repeat_password = strip_tags($_POST['rep_pass']);
  
  $old_password = $db->real_escape_string($old_password); 
  $old_password = str_replace("'", "&apos;", $old_password);
  
  $new_password = $db->real_escape_string($new_password); 
  $new_password = str_replace("'", "&apos;", $new_password);
  
  $repeat_password = $db->real_escape_string($repeat_password); 
  $repeat_password = str_replace("'", "&apos;", $repeat_password);

if ($new_password != "" || $old_password != "" || $repeat_password != "") {

$d = date("Y-m-d"); // Year - Month - Day

 //If the form has been submitted ...

  $password_query = $db->query("SELECT * FROM users WHERE username='$user'");
  while ($row = $password_query->fetch_assoc()) {
  $db_password = $row['password'];
  
  }
        //md5 the old password before we check if it matches
        $old_password_md5 = md5($old_password);
        
        //Check whether old password equals $db_password
        if ($old_password_md5 == $db_password) {
         //Continue Changing the users password ...
         //Check whether the 2 new passwords match
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
             echo "<center>Your password must be more than 4 character long!</center>";
            }
            else
            {
            //md5 the new password before we add it to the database
            $new_password_md5 = md5($new_password);
           //Great! Update the users passwords!
           $password_update_query = $db->prepare("UPDATE users SET password=? WHERE username='$user'");
           $password_update_query->bind_param("s", $new_password_md5);
           $password_update_query->execute();
       
           echo "<center>Your password has been updated!</center>";

            }
         }
         else
         {
          echo "<center>Your two new passwords don't match!</center>";
         }
        }
        else
        {
         echo "<center>The old password is incorrect!</center>";
        }
  
   }
  else
  {
   echo "<center>Fill in all fields</center>";
  }


}
?>