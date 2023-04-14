<?php include("php/connectit.php"); ?>
<?php
$refrex = (!empty($_GET['ref']) ? $_GET['ref'] : null);
$refrex = $db->real_escape_string($refrex); 

   $uname = strip_tags($_POST['uname']);
   $fname = strip_tags($_POST['fname']);
   $email = strip_tags($_POST['email']);
   $pass1 = strip_tags($_POST['pass1']);
   $pass2 = strip_tags($_POST['pass2']);
   $coun = strip_tags($_POST['coun']);
   $sex = strip_tags($_POST['sex']);
   $phon = strip_tags($_POST['phon']);
   
   
   $uname = $db->real_escape_string($uname); 
   $fname = $db->real_escape_string($fname); 
   $email = $db->real_escape_string($email); 
   $pass1 = $db->real_escape_string($pass1); 
   $pass2 = $db->real_escape_string($pass2); 
   $coun = $db->real_escape_string($coun); 
   $sex = $db->real_escape_string($sex); 
   $phon = $db->real_escape_string($phon); 
   
   $uname = strtolower("$uname");
   
   // Check if user already exists
   $u_check = $db->query("SELECT username FROM users WHERE username='$uname'");
   // Count the amount of rows where username = $un
   $check = $u_check->num_rows;
   
   
   // Check if email already exists
   $e_check = $db->prepare("SELECT email FROM users WHERE email=?");
   $e_check->bind_param("s", $email);
   $e_check->execute();
   $e_check = $e_check->get_result();
   // Count the amount of rows where username = $un
   $checkee = $e_check->num_rows;
   
   
   if ($uname != "" && $fname!= "" && $email!= "" && $pass1!= "" && $pass2!="" && $coun!="" && $sex!="") {


   if (strlen($uname) < 3) {
    echo "Your Username must not be less than 3 characters long.";
    exit();
   }
   else
   if (strlen($fname) < 5) {
    echo "Your Fullname must not be less than 5 characters long.";
    exit();
   }
   
   
   else
   if ($pass1 != $pass2) {
    echo "Your passwords do not match.";
    exit();
   }
   
   
 else 
      
   
   if ($check != 0) {
   
       echo "Sorry $uname is already taken.";
       exit();
   
 }
 
 else
     
     if ($checkee != 0) {
   
       echo "Sorry $email is already taken.";
       exit();
   
 }
 
   
   else
   {
    //Submit the form to the database
      
	    // Begin Insertion of data into the database
                // GET USER IP ADDRESS
                $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
		// Hash the password and apply your own mysterious unique salt
		$pass1 = md5($pass1);
		// Add user info into the database table for the main site table
		
                
		$query = $db->prepare("INSERT INTO users VALUES ('',?,?,?,?,?,now(),'no','','','','','','',?,'no','','',?,'','$ip','','','Naira','&#8358;','','','','','','','','','','','','','','','','on','on','','','','','','','','','','','','','','','','','')");
                $query->bind_param("sssssss", $uname, $fname, $email, $pass1, $sex, $coun, $phon);
                $query->execute();  
                
                $option = $db->prepare("INSERT INTO options VALUES ('',?,'original',now())");
                $option->bind_param("s", $uname);
                $option->execute(); 
                
                $ponzee = $db->prepare("INSERT INTO ponzee VALUES ('',?,?,'','','','','','','','','','','on','','',now(),'','','','','','','','','','',?,'','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
                $ponzee->bind_param("sss", $uname, $refrex, $coun);
                $ponzee->execute(); 
                
                // Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$uname")) {
			mkdir("user/$uname", 0755);
                        mkdir("user/$uname/posts", 0755);
                        mkdir("user/$uname/messages", 0755);
                        mkdir("user/$uname/profile_pics", 0755);
                        mkdir("user/$uname/multiple", 0755);
                        mkdir("user/$uname/tradefair", 0755);
                        mkdir("user/$uname/customers", 0755);
		}
                
// Email the user their activation link
///// SMS SCRIPT
$pono = "$phon";  
$titmet = "Sparrow";
$memet = "Hello $uname... You have been successfully registered on Sparrow Network. Pls check your email for your login details.";
include("sms_script.php");    
//////

// Email Script
$emailo = "$email";
$subolo = "Signup Info";
$mailbod = "Welcome to Sparrow Network $uname. Kindly find below your login details.<br>Username: $uname <br> Password: $pass2";
include("email_script.php");
//////////////////////////////////////
                
		
		
    echo "Success";
    exit();
    //End Submit form
   }
  }
  else
  {
   echo "Fill out all of the form data";
   exit();
  }
   
   

?>


