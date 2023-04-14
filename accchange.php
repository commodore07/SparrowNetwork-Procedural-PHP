<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
/////////////
$getmedver = $db->query("SELECT * FROM ponzee WHERE username='$user'") or die($db->error());
$infover = $getmedver->num_rows;

if(!empty($_POST['accnam']) && !empty($_POST['banknam']) && $infover > 0){    
    
$accnam = strip_tags($_POST['accnam']);
$accnam = $db->real_escape_string($accnam); 
$accnam = str_replace("'", "&apos;", $accnam);

$get_numbaa = $db->query("SELECT * FROM ponzee WHERE username='$user'");
$rollin = $get_numbaa->fetch_assoc();
$regnumbaa = $rollin['account_number'];

$banknam = strip_tags($_POST['banknam']);
$banknam = $db->real_escape_string($banknam); 
$banknam = str_replace("'", "&apos;", $banknam);

if($accnam == "$regnumbaa"){
    echo "Sorry this account number has been registered";
} else {
$picxdat = $db->prepare("UPDATE ponzee SET account_number=?, bank_name=? WHERE username=?");
$picxdat->bind_param("sss", $accnam, $banknam, $user);
$picxdat->execute();  
echo "Bank account update was successful";
// Display things to the page so you can see what is happening for testing purposes
}
} else {
    echo "Fields cannot be empty";
}


//////////////////////////////////
}
?>