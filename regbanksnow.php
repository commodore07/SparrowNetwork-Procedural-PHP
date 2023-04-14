<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
                    
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if(!empty($_POST['bankcontee']) && !empty($_POST['bankname'])){  
$bankname = strip_tags($_POST['bankname']);
$bankname = $db->real_escape_string($bankname); 
$bankname = str_replace("'", "&apos;", $bankname);    
///////////    
  
$bankcontee = strip_tags($_POST['bankcontee']);
$bankcontee = $db->real_escape_string($bankcontee); 
$bankcontee = str_replace("'", "&apos;", $bankcontee);

$nulco = "";    
// prepare and bind
$stmt = $db->prepare("INSERT INTO bankz VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nulco, $bankname, $bankcontee, $nulco);
$stmt->execute();
$stmt->close();
echo "Bank was successfully added";
} else {
    echo "Fill in all fields";
}
}

?>