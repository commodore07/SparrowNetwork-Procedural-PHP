<?php include("php/connectit.php"); ?>
<?php 
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
?>
 
<?php 
$post = strip_tags($_POST['sarchword']);
$post = str_replace("'", "&apos;", $post);
$tino = time();
if ($post != "") {
/////////// Search Query Begins
$getrellit = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') ORDER BY RAND()" ) or die($db->error()); 
$getrellit->bind_param("s", $post);
$getrellit->execute();
$getrellit = $getrellit->get_result();

$relcount = $getrellit->num_rows;

$getinftee = $db->prepare("SELECT * FROM tradefair WHERE name LIKE CONCAT('%',?,'%') ORDER BY RAND() LIMIT 7" ) or die($db->error());
$getinftee->bind_param("s", $post);
$getinftee->execute();
$getinftee = $getinftee->get_result();

while ($roz = $getinftee->fetch_assoc()) {
    
                                                $nom = $roz['name'];
                                                $price = $roz['price'];
                                                $price = number_format($price);
                                                $pic = $roz['pic'];
                                                $unk = $roz['username'];
                                                $chas = $roz['chasis'];
                                                
$getinfteef = $db->query("SELECT * FROM users WHERE username='$unk'" ) or die($db->error());
while ($roz = $getinfteef->fetch_assoc()) {
    $uni = $roz['vac3'];
    $procropic = $roz['profilecrop_pic'];
    if($procropic == ""){
        $procropic = "./img/default_pic.jpg";
    } else {
        $procropic = "$procropic";
    }
}     
?>              
              <div class="follow-user">
                  <img src="<?php echo $pic; ?>" alt="" width="50" style="margin-right: 10px;" class="img-rounded pull-left" />
                  <img src="<?php echo $procropic; ?>" alt="" width="50" style="margin-right: 10px;" class="img-circle pull-right" />
                <div>
                    <h5><a href="trade_seche?term=<?php echo $post; ?>&u=<?php echo $unk; ?>"><?php echo $nom; ?></a></h5>
                  <a href="trade_seche?term=<?php echo $post; ?>&u=<?php echo $unk; ?>" class="text-green"><?php echo "$uni$price"; ?></a>
                </div>
              </div>
         
<?php 
}
?>
<?php 
if($relcount == 0){
?>
<div style="text-align: center; margin-top: 10px;">No match found</div>
<?php 
} else if($relcount == 1) {
?>
<div style="text-align: center;"><?php echo $relcount; ?> result found...</div>
<?php
////////// End Search Query    
} else if($relcount < 6) {
?>
<div style="text-align: center;"><?php echo $relcount; ?> results found...</div>
<?php
////////// End Search Query    
} else {
?>
<div style="text-align: center;"><a href="trade_grandseche?term=<?php echo $post; ?>&u=<?php echo $user; ?>">See all <?php echo $relcount; ?> results...</a></div>
<?php
////////// End Search Query    
}
}
?>
