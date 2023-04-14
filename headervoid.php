<?php include("php/connectit.php"); ?>

<?php include("user_script.php"); ?> 


<?php 
$username = "";
if (isset($_GET['u'])) {
	$username = $db->real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = $db->prepare("SELECT username FROM users WHERE username=?");
        $check->bind_param("s", $username);
        $check->execute();
        $check = $check->get_result();
	if ($check->num_rows===1) {
	$get = $check->fetch_assoc();
	$username = $get['username'];
	}
	else
	{
            echo "<meta http-equiv=\"refresh\" content=\"0; url=home\">";
	exit();
	}
	}
$username = $db->real_escape_string($username);
$username = str_replace("\'","&apos;", $username);
}
?>


<head>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Welcome to Sparrow Network..." />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
<?php 
$get_xoa = $db->query("SELECT * FROM users WHERE username='$user'");
$roloa = $get_xoa->fetch_assoc();
$fnoa = $roloa['fullname'];
$blockstat = $roloa['blockstaxee'];

$pcropic = $roloa['profilecrop_pic'];
if($pcropic == "" || $user == ""){
    $pcropic = "img/default_pic";
} else {
    $pcropic = "$pcropic";
}

if($user == ""){
    $titixiz = "Sparrow Network";
}
else {
    $titixiz = "$fnoa";
}
?>                
		<title><?php echo $titixiz ?></title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popit.css" />
    <link href="css/chat.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/gradiante.css">  
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    <script src="js/jquery.js"></script>
    
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1298090475159620",
          enable_page_level_ads: true
     });
</script>        
    
</head>

<?php 
$info = 0;
?>
  
<script>
$( window ).load(function() {   
    var post = "sparrow";   
    $.post('total_view.php',{post: post});
});
</script>  

<?php 
$unki = "Nigeria"; 
$getinxi = $db->prepare("SELECT * FROM general_details WHERE country_spar=?") or die($db->error());
$getinxi->bind_param("s", $unki);
$getinxi->execute();
$getinfteefi = $getinxi->get_result();
$rollini = $getinfteefi->fetch_assoc();
$uppstax = $rollini['update_status'];

if($blockstat == "on"){
echo "<meta http-equiv=\"refresh\" content=\"0; url=logout\">";
	exit();
} else {
    //// DO NOTHING
}

if($uppstax == "on" && $user != "" && $user != "support"){
echo "<meta http-equiv=\"refresh\" content=\"0; url=logout\">";
	exit();
} else {
    //// DO NOTHING
}
?>  

<style>
@font-face{
 font-family:'digital-clock-font';
 src: url('digitfont.ttf');
}
</style>   