<?php 
if($user != ""){
?>
<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href=""><img src="images/favicon.png" width="43" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
                <li title="Home" class="dropdown"><a href="./home"><i style="font-size: 20px;" class="fa fa-home"></i> Home</a></li>
<style>
     
.messagesk{
	position:absolute;
	text-align: center;
	font-size:1em;
	color:#FFF;
	background:#8dc63f;
	width: 25px;
        font-weight: 500;
	height: 23px;
	-webkit-border-radius:0.8em;
	-moz-border-radius:0.8em;
	-o-border-radius:0.8em;
}     
     
 </style>
 
 <?php
$get_novie = $db->query("SELECT * FROM notifications WHERE username='$user' AND notifier != '$user' AND status='no'");
$liknovie = $get_novie->num_rows;
if($liknovie == 0){
    $likevax = "";
}
else {
    $likevax = "<span class='messagesk'>$liknovie</span>";
}
 ?>
 
 <li title="Notifications" class="dropdown"><a href="notification"><i style="font-size: 18px;" class="fa fa-bell"></i> <span id="notixiz"><?php echo $likevax; ?></span> Notifications</a></li>
                
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#notixiz').load('my_notify.php');
                                      }, 2000);  
                                    });
                                    </script>                

<?php 
                            ///// Count unread chats
                            $get_nex = $db->query("SELECT * FROM msg_reply WHERE receiver = '$user' AND emp1 != 'seen'");
                            $canex = $get_nex->num_rows; 
if($canex == 0){
    $caveek = "";
}
else {
    $caveek = "<span class='messagesk'>$canex</span>";
}
                            ///////// End count 
?>                                    
                <li title="Messages" class="dropdown"><a href="messages"><i style="font-size: 18px;" class="fa fa-envelope"></i> <span id="notimex"><?php echo $caveek; ?></span> Messages</a></li>
                
                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#notimex').load('my_mex.php');
                                      }, 2000);  
                                    });
                                    </script>    
                
              <li data-toggle="modal" data-target=".lamenue" title="Account" class="dropdown">
                <a role="button">Account <span><img src="images/down-arrow.png" alt="" /></span></a>
              </li>
              <li class="dropdown">
                  <button data-toggle="modal" data-target=".grandchirp" style="margin: 10px;" class="btn btn-primary ">Chirp</button>
              </li>
            </ul>
            <form id="fomzzee" class="navbar-form navbar-right">
                <div class="input-group">
                    <input data-toggle="modal" id="sarchtexa" data-target=".searchit" type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button data-toggle="modal" data-target=".searchit" id="masarchee" class="btn btn-default" type="button"><i style="color: #999;" class="fa fa-search"></i></button>
                    </span>
                </div><!-- /input-group -->
            </form>
                            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>

<?php 
}
else {
?>


<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a class="navbar-brand" href=""><img src="images/favicon.png" width="43" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login / Signup <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="index">Index page</a></li>  
                    <li><a href="./my_trade">Tradefair page</a></li>  
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Sign up</a></li>
                  </ul>
              </li>
              
              
              
              
            </ul>
              <form id="fomzzee" class="navbar-form navbar-right">
                <div class="input-group">
                    <input data-toggle="modal" id="sarchtexa" data-target=".searchit" type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button data-toggle="modal" data-target=".searchit" id="masarchee" class="btn btn-default" type="button"><i style="color: #999;" class="fa fa-search"></i></button>
                    </span>
                </div><!-- /input-group -->
            </form>
                              
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>

<?php 
}
?>