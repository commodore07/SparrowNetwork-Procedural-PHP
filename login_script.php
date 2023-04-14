<?php
$ans = "";
//Login Script
if (isset($_POST["uuu"]) && isset($_POST["access"])) {
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    $timm = time();
    $date_added = date("Y-m-d");
        
       $user_login = str_replace("'", "&apos;", $_POST["uuu"]);
       $user_login = $db->real_escape_string($user_login); 
       $user_login = str_replace("'","&apos;", $user_login);
       
       $password_login = str_replace("'", "&apos;", $_POST["access"]);
       $password_login = $db->real_escape_string($password_login); 
       $password_login = str_replace("'","&apos;", $password_login);
       
       $password_login_md5 = md5($password_login);
       
///////////////////////
//////////////// GET EMAIL TRANSFORM EMAIL
$get_mill = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$get_mill->bind_param("ss", $user_login, $password_login_md5);
$get_mill->execute();
$get_mill = $get_mill->get_result();

$count_mill = $get_mill->num_rows;
while ($mill = $get_mill->fetch_assoc()) {
$effat = $mill['username'];  
}
/////////////// LOGIN STATEMENT
if ($count_mill > 0){
    $user_login = "$effat";
}
else {
    $user_login = "$user_login";
}
/////////////////////          
    $user_login = strtolower("$user_login");
    $sql = $db->prepare("SELECT id FROM users WHERE username=? AND password=? LIMIT 1"); // query the person
    $sql->bind_param("ss", $user_login, $password_login_md5);
    $sql->execute();
    $sql = $sql->get_result();	
//Check for their existance
	$userCount = $sql->num_rows; //Count the number of rows returned
	if ($userCount == 1) {
		while($row = $sql->fetch_array()){ 
             $id = $row["id"];
	}
		 $_SESSION["user_login"] = $user_login;
                     ///////////////// CHECK IF USER HAS BEEN BLOCKED BEGINS
                     
                     $sqlive = $db->prepare("SELECT blockstaxee FROM users WHERE username=? AND password=?"); // query the person
	             $sqlive->bind_param("ss", $user_login, $password_login_md5);
                     $sqlive->execute();
                     $sqlive = $sqlive->get_result();
//Check for their existance
	$blockCount = $sqlive->num_rows; //Count the number of rows returned
        
        if ($blockCount == 1) {
		while($row = $sqlive->fetch_array()){ 
             $vac3 = $row["blockstaxee"];
             
	}  
                     ///////////////// CHECK IF USER HAS BEEN BLOCKED ENDS
        if ($vac3 != "on") {        
		 // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			 $gioxx = $db->prepare("UPDATE users SET ip='$ip', login_date='$date_added', log_time='$timm' WHERE username=?");
                         $gioxx->bind_param("s", $user_login);
                         $gioxx->execute();
                         
			$ans = "Welcome to Sparrow";
                    //////////////////////// ADMIN OR NOT
                    if($user_login != 'admin'){
                      echo "<meta http-equiv=\"refresh\" content=\"0; url=my_cashflow\">";  
                    }
                    else {
                    ///////////////////////    
                       echo "<meta http-equiv=\"refresh\" content=\"0; url=admin_page\">";
                    }
                        
		    exit();
        }
 else {
     
     $ans = "Sorry $user_login you've been blocked by Sparrow Network!";
 }
        } 
		 }
		 else {
                     $getposts = $db->prepare("SELECT * FROM users WHERE username=? OR email=? LIMIT 1") or die($db->error());
                     $getposts->bind_param("ss", $user_login, $user_login);
                     $getposts->execute();
                     $getposts = $getposts->get_result();
                     
                     $countin = $getposts->num_rows; //Count the number of rows returned
                     while ($row = $getposts->fetch_assoc()) {
						$id = $row['id'];
						$passq = $row['password'];
                     }
                     if ($countin == 0) {
		$ans = "$user_login is not registered on sparrow";
	}
        else {
            $ans = "Incorrect login details!";
        }          
	}
}
?>    