<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?>
                    
<?php
///////////// IS USER LOGGED IN?
if($user != ""){
if(!empty($_POST['currcontee']) && !empty($_POST['currname']) && !empty($_POST['currcode'])){  
$currname = strip_tags($_POST['currname']);
$currname = $db->real_escape_string($currname); 
$currname = str_replace("'", "&apos;", $currname);    
///////////    
$currcode = strip_tags($_POST['currcode']);
$currcode = $db->real_escape_string($currcode); 
$currcode = str_replace("'", "&apos;", $currcode);       
////////////    
$currcontee = strip_tags($_POST['currcontee']);
$currcontee = $db->real_escape_string($currcontee); 
$currcontee = str_replace("'", "&apos;", $currcontee);
////////// CONDITIONS
$get_pez = $db->query("SELECT * FROM currency WHERE country='$currcontee'");
$countcon = $get_pez->num_rows;
$rocez = $get_pez->fetch_assoc();
$counspa = $rocez['country_spar'];

if($countcon > 0){
    $updt = $db->prepare("UPDATE currency SET currency=?, code=? WHERE country='$currcontee'");
    $updt->bind_param("ss", $currname, $currcode);
    $updt->execute();
    $updt->close();
    echo "Update was successful";
} else {
$nulco = "";    
// prepare and bind
$stmt = $db->prepare("INSERT INTO currency VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nulco, $currname, $currcode, $currcontee, $nulco);
$stmt->execute();
$stmt->close();
echo "Currency was successfully added";
}
} else {
    echo "Fill in all fields";
}
}

?>