 <!--Popup-->
                    <div class="modal fade updateacc" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Update account number</div>
                            </div>
                            <div class="post-container">
<?php
$get_phot = $db->prepare("SELECT * FROM ponzee WHERE username=?");
$get_phot->bind_param("s", $user);
$get_phot->execute();
$get_phot = $get_phot->get_result();
$rollin = $get_phot->fetch_assoc();
$beenamek = $rollin['bank_name'];
if($beenamek == ""){
    $beenamek = "Access Bank Plc";
} else {
    $beenamek = "$beenamek";
}
$acceek = $rollin['account_number'];
if($acceek == ""){
    $acceek = "1234567890";
} else {
    $acceek = "$acceek";
}

$get_nazz = $db->prepare("SELECT * FROM users WHERE username=?");
$get_nazz->bind_param("s", $user);
$get_nazz->execute();
$get_nazz = $get_nazz->get_result();
$rolloc = $get_nazz->fetch_assoc();
$lanamz = $rolloc['fullname'];

?>
                                
<?php 
$get_empzza = $db->prepare("SELECT * FROM ponzee WHERE username=?");
$get_empzza->bind_param("s", $user);
$get_empzza->execute();
$get_empzza = $get_empzza->get_result();
$rolzaa = $get_empzza->fetch_assoc();
$sparconnn = $rolzaa['spar_coun'];
$ewallex = $rolzaa['e_wallet'];
if($ewallex == ""){
    $ewallex = 0;
} else {
    $ewallex = "$ewallex";
}
$ewallex = number_format($ewallex);
$ewallzix = $rolzaa['e_wallet'];
if($ewallzix == ""){
    $ewallzix = 0;
} else {
    $ewallzix = "$ewallzix";
}
$umpghmaa = $rolzaa['unmatched_gh'];
if($umpghmaa == ""){
    $umpghmaa = 0;
} else {
    $umpghmaa = "$umpghmaa";
}

$umeeghip = $rolzaa['unmatched_gh'];
if($umeeghip == ""){
    $umeeghip = 0;
} else {
    $umeeghip = "$umeeghip";
}
$umeeghip = number_format($umeeghip);

$diffmagh = $ewallzix - $umpghmaa;
?>  
                    
<?php
$get_rencee = $db->prepare("SELECT * FROM currency WHERE country=?");
$get_rencee->bind_param("s", $sparconnn);
$get_rencee->execute();
$get_rencee = $get_rencee->get_result();
$rorence = $get_rencee->fetch_assoc();
$vee3 = $rorence['code'];
?>                          
                    
<?php 
$get_pez = $db->prepare("SELECT * FROM general_details WHERE country_spar=?");
$get_pez->bind_param("s", $sparconnn);
$get_pez->execute();
$get_pez = $get_pez->get_result();
$rocez = $get_pez->fetch_assoc();
$crezzq = $rocez['interest_rate'];
$jarate = $crezzq / 100;

$matageet = $rocez['my_target'];
$maxxigeeh = $rocez['max_gh'];
$maxxigeeh = number_format($maxxigeeh);
?>                                  
                                <form method="post" name="registration_form" id='registration_form' class="form-inline">
                    
                    
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Account number</label>
                        <input name="accnam" id="accnam" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" value="<?php echo $acceek; ?>" placeholder="<?php echo $acceek; ?>" type="text" title="Enter account number" />
                      </div>
                    </div>
                   
                    
                      
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Banks</label>
                        <select name="banknam" class="form-control" id="banknam">
                          <option><?php echo $beenamek; ?></option>
<?php 
$getconva = $db->prepare("SELECT * FROM bankz WHERE bank_coun=?") or die($db->error());
$getconva->bind_param("s", $sparconnn);
$getconva->execute();
$getconva = $getconva->get_result();
while ($roz = $getconva->fetch_assoc()) {
    $baknak = $roz['bank_name'];
?>
<option value="<?php echo $baknak; ?>"><?php echo $baknak; ?></option>                          
<?php                          
}     
?>                          
                        </select>
                      </div>
                    </div>  
                      
                      <button id="signupbtn" class="btn btn-primary">Update</button> 
                      <span id="datstat"></span>
                  </form><!--Register Now Form Ends-->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->
                    
                    
<script>
$(document).ready(function(){
   $('#registration_form').on('submit', function(e){
      e.preventDefault();
      document.getElementById("datstat").innerHTML = "<img src='./lodaa.gif'>";
      var log_too = document.getElementById("datstat");
      $.ajax({
         url: "accchange.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#datstat").html(data);
             // jquery fade-out fade-in begins
                $("#datstat").delay(3000).fadeOut("slow", function() {
                    log_too.innerHTML = "";	        
                });
                $("#datstat").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
         }
      });
   });
});
</script>                               
                    

<!--Popup-->
                    <div class="modal fade providehelp" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Provide Help</div>
                            </div>
                            <div class="post-container">
                                 
                                <div style="text-align: center;">         
                    <div class=" col-md-12">
                
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>
                    

                    <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Get <?php echo $crezzq; ?>% in 26 active days
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      Welcome <?php echo $lanamz; ?>. Join a community where everybody is financially stable and wealth circulated.
                      Empower someone now... PLEASE USE YOUR SPARE MONEY 
                      <p><img width="20" src="css/emoji/pray.png">
                      <img width="20" src="css/emoji/pray.png">
                      <img width="20" src="css/emoji/pray.png"></p>
                     
                        </p></center>

                    <form method="post" id="empmenow" class="navbar">
                        <p style="float: left;">PH Amount: <?php echo $vee3; ?><span id="phanax"></span></p>  
                        <p>GH Amount: <?php echo $vee3; ?><span id="ghanax"></span></p> 
                        
                        <p style="float: left;">Target: <?php echo $vee3; ?><span id="matagett"></span></p>  
                        <p>Daily Earnings: <?php echo $vee3; ?><span id="dailyearn"></span></p> 
                        
<script>
function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }    
    
$(document).ready(function() {
    $('#phzamz').keyup(function() {
    var sarchamz = document.getElementById("phzamz").value;
    var mulchamz = "<?php echo $jarate ?>" * parseFloat(sarchamz);
    var intchamz = parseFloat(sarchamz) + parseFloat(mulchamz);
    var dayenn = intchamz / 26;
    if(isNaN(dayenn)){
        var dayenn = "";
    }
    if(isNaN(intchamz)){
        var intchamz = "";
    }
    var teegittt = "<?php echo $matageet ?>";
    var targiee = parseFloat(sarchamz) * parseFloat(teegittt);
    if(isNaN(targiee)){
        var targiee = "";
    }
        document.getElementById("phanax").innerHTML=thousands_separators(sarchamz);
        document.getElementById("ghanax").innerHTML=thousands_separators(intchamz);
        document.getElementById("dailyearn").innerHTML=thousands_separators(dayenn);
        document.getElementById("matagett").innerHTML=thousands_separators(targiee);
});
});
</script>                             
                        
                    <div class="input-group">
                        <input id="phzamz" name="emppok" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" class="form-control" placeholder="Enter amount">
                    <span class="input-group-btn">
                        <button class="btn btn-default">PH</button>
                    </span>
                                            
                    </div><!-- /input-group -->
                    </form>
                    
                    <span id="mpmenowstat"></span>    
                        
<script>
$(document).ready(function(){
   $('#empmenow').on('submit', function(emm){
      emm.preventDefault();
      document.getElementById("mpmenowstat").innerHTML = "<img src='./lodaa.gif'>";
      var log_tooxie = document.getElementById("mpmenowstat");
      $.ajax({
         url: "empnow.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#mpmenowstat").html(data);
             // jquery fade-out fade-in begins
                $("#mpmenowstat").delay(10000).fadeOut("slow", function() {
                    log_tooxie.innerHTML = "";	        
                });
                $("#mpmenowstat").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
         }
      });
   });
});
</script>                
                  
                  </div>
                  </div>
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
                    
                    
<!--Popup-->
                    <div class="modal fade gethelp" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Get Help</div>
                            </div>
                            <div class="post-container">
                                <div style="text-align: center;">         
                    <div class=" col-md-12">
                
                    <!-- Image -->
                    <center><img src="happiness.svg" alt="..." style="max-width: 272px;"></center>
                                <!-- Title -->
                    <center><h4 style="max-width: 350px; font-size: 20px; color: #000; font-weight: 700;">
                      Get Empowered Now
                        </h4></center>

                    <!-- Content -->
                    <center><p style="max-width: 350px; font-weight: 500; color:#95aac9" class="text-muted">
                      
                      <img width="20" src="css/emoji/wave.png">
                      <img width="20" src="css/emoji/wave.png">
                      <img width="20" src="css/emoji/wave.png">
                     
                        </p></center>
                    
                    <form method="post" id="gethelpnow" class="navbar">
                        <p style="float: left;">GH Limit: <?php echo "$vee3$maxxigeeh"; ?></p>  
                        <p>Unmatched GH: <?php echo "$vee3$umeeghip"; ?></p> 
                        
<script>
    $(document).ready(function() {
    $('#ghzamz').keyup(function() {
    var ghachamz = document.getElementById("ghzamz").value;
    var ewallxix = "<?php echo $diffmagh; ?>";
    var ballxxx = parseFloat(ewallxix) - parseFloat(ghachamz);
    if(isNaN(ballxxx)){
        var ballxxx = "";
    }
        document.getElementById("ghavaxa").innerHTML=thousands_separators(ghachamz);
        document.getElementById("labalzz").innerHTML=thousands_separators(ballxxx);
    });
    });
</script>                        
                        
                        <p style="float: left;">GH Amount: <?php echo $vee3; ?><span id="ghavaxa"></span></p>
                        <p>Balance: <?php echo "$vee3"; ?><span id="labalzz"></span></p> 
                        <div style="float: left;" class="input-group">
                        <input id="ghzamz" name="getpok" maxlength="13" onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" class="form-control" placeholder="Enter amount">
                    <span class="input-group-btn">
                        <button class="btn btn-default">GH</button>
                    </span>
                                            
                    </div><!-- /input-group -->
                    </form>
                    <span id="gethelpstat"></span>   
                    
<script>
$(document).ready(function(){
   $('#gethelpnow').on('submit', function(elp){
      elp.preventDefault();
      document.getElementById("gethelpstat").innerHTML = "<img src='./lodaa.gif'>";
      var log_tooxelp = document.getElementById("gethelpstat");
      $.ajax({
         url: "getempnow.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#gethelpstat").html(data);
             // jquery fade-out fade-in begins
                $("#gethelpstat").delay(10000).fadeOut("slow", function() {
                    log_tooxelp.innerHTML = "";	        
                });
                $("#gethelpstat").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
         }
      });
   });
});
</script>                        
                    
                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->     
                    
                    
                    <!--Popup-->
                    <div class="modal fade uploadpop" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Proof of payment</div>
                            </div>
                            <div class="post-container">
                                <div id="reqppop"></div> 
                                <form action="pop.php" method="post" enctype="multipart/form-data">
                                    <textarea style="display: none;" id="popid" name="popid"></textarea>
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Upload proof of payment" style="font-size: 20px;"></i>   <input name="confpop" type="file" style="display: none;">
                                    </label>
                                    
                                    <button class="btn btn-primary " type="submit">Upload</button>
                                </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
                    
                    <!--Popup-->
                    <div class="modal fade confirmpop" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Confirm payment</div>
                            </div>
                            <div class="post-container">
                                <div id="confixpop"></div> 
                                <form action="confthatpop.php" method="post" enctype="multipart/form-data">
                                    <textarea style="display: none;" id="popconfid" name="popconfid"></textarea>
                                    
                                    <button class="btn btn-primary " type="submit">Confirm payment</button>
                                </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->     
                    
                    
                    <!--Popup-->
                    <div class="modal fade canxelquest" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Do you want to cancel this request?</div>
                            </div>
                            <div class="post-container">
                                <div id="requodisp"></div>
                                
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">
                                        <label>Add a comment</label>
                                        <form action="cansquest.php" method="post">
                                            <textarea style="display: none;" id="terminam" name="terminam"></textarea> 
                                            <textarea name="termires" id="termires" class="form-control" rows="8" cols="400"></textarea>
                                            <button id="xankin" style="margin-top: 10px;" class="btn btn-primary " type="submit">Cancel request</button>
                                        </form>
                                        
<script>
$("#xankin").prop("disabled", "disabled");
$("#termires").on("keyup", function () {
  if ($(this).val() != "") {
    $("#xankin").prop("disabled", false);
  } else {
    $("#xankin").prop("disabled", "disabled");
  }
});
</script>                                            
                                        
                                        </div>
                                    </div>
                                    
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
<!--Popup-->
                    <div class="modal fade matchreceive" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Match manually</div>
                            </div>
                            <div class="post-container">
                                <div id="revevdisp"></div>
                                
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">
                                        <label>Click to match</label>
                                        <form id="uploadFormxie" method="post">
                                            <textarea style="display: none;" id="revevminam" name="revevminam"></textarea> 
                                            <textarea style="display: none;" id="amvoq" name="amvoq"></textarea> 
                                            <textarea style="display: none;" id="pavoq" name="pavoq"></textarea> 
                                            <button style="margin-top: 10px;" class="btn btn-primary " type="submit">Match to receive</button><br>
                                            <span id="loaderiz"><img src='./lodaa.gif'></span>
                                            <span id="matchput"></span>
                                        </form> 
                                        
<script>
$('#loaderiz').hide();    
$(document).ready(function(){
   $('#uploadFormxie').on('submit', function(eliq){
      eliq.preventDefault();
      $('#loaderiz').show();
      $.ajax({
         url: "receiveph.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#matchput").html(data);
             $('#loaderiz').hide();
            
         }
      });
   });
});
</script>                                            
                                        
                                        </div>
                                    </div>
                                    
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->          
                    
                    <!--Popup-->
                    <div class="modal fade privmessage" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Send a private message</div>
                            </div>
                            <div class="post-container">
                                <div id="requoqoi"></div>
                                
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">
                                        <label>Compose message</label>
                                        <form onsubmit="return false" method="post">
                                            <textarea style="display: none;" id="terminaqoi" name="terminaqoi"></textarea> 
                                            <textarea style="display: none;" id="casexid" name="casexid"></textarea> 
                                            <textarea name="terqoi" id="terqoi" class="form-control" rows="8" cols="400"></textarea>
                                            <button id="xanqoi" style="margin-top: 10px;" class="btn btn-primary " type="submit">Send PM</button>
                                            <span style="float: right;" id="xan_rezx"></span>
                                        </form>
                                        
<script>
$("#xanqoi").prop("disabled", "disabled");
$("#terqoi").on("keyup", function () {
  if ($(this).val() != "") {
    $("#xanqoi").prop("disabled", false);
  } else {
    $("#xanqoi").prop("disabled", "disabled");
  }
});
</script>

<script>
$(document).ready(function() {
    $('#xanqoi').click(function() {
    $("#xanqoi").prop("disabled", "disabled");
    document.getElementById("xan_rezx").innerHTML = "<center><img src='./loader2.gif'></center>";  
    var xanwozx = document.getElementById("terminaqoi").value;
    var granwozx = document.getElementById("terqoi").value;
    var caseqid = document.getElementById("casexid").value;
    var log_too = document.getElementById("xan_rezx");
    $.post('msg_match.php',{dauser: xanwozx, postxaz: granwozx, lacaseid: caseqid},function(data) {
        $("#xan_rezx").html(data);
        $('#terqoi').val('');
        // jquery fade-out fade-in begins
                $("#xan_rezx").delay(3000).fadeOut("slow", function() {
                    log_too.innerHTML = "";	        
                });
                $("#xan_rezx").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
    });
});
});
</script>     
                                        
                                        </div>
                                    </div>
                                    
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
                    
<?php include("add_country.php"); ?>      
                    
<!--Popup-->
                    <div class="modal fade regrenci" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Add currency</div>
                            </div>
                            <div class="post-container">
                                <form name="regcurr" id="regcurr" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label>Currency</label>
                        <input id="currname" name="currname" class="form-control input-group-lg" maxlength="30" type="text" title="Name of currency" placeholder="Name of currency" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label>Code</label>
                        <input id="currcode" name="currcode" maxlength="12" class="form-control input-group-lg" type="text" title="HTML code" placeholder="HTML code" />
                      </div>
                    </div>
                    
                      
                   <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Country</label>
                        <select id="currcontee" name="currcontee" class="form-control">
                          <option>Select Country</option>
                          <?php include("country.php"); ?>
                        </select>
                      </div>
                   </div><br>
                    
                      <button class="btn btn-primary">Add</button>
                      <center><div style="height: 14px;" id="currstat"></div></center>
                  </form>

<script>
$(document).ready(function(){
   $('#regcurr').on('submit', function(curr){
      curr.preventDefault();
      document.getElementById("currstat").innerHTML = "<img src='./lodaa.gif'>";
      var log_toocurr = document.getElementById("currstat");
      $.ajax({
         url: "regcurrnow.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#currstat").html(data);
             $('#currname').val('');
             $('#currcode').val('');
             // jquery fade-out fade-in begins
                $("#currstat").delay(10000).fadeOut("slow", function() {
                    log_toocurr.innerHTML = "";	        
                });
                $("#currstat").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
         }
      });
   });
});
</script>                                       
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->   
                    
<?php include("addbankz.php"); ?>      
                    
                    
<!--Popup-->
                    <div class="modal fade reversepop" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Reverse POP & block user</div>
                            </div>
                            <div class="post-container">
                                <div id="revixpop"></div> 
                                <form action="revthatpop.php" method="post" enctype="multipart/form-data">
                                    <textarea style="display: none;" id="revconfid" name="revconfid"></textarea>
                                    
                                    <button class="btn btn-primary " type="submit">Reverse</button>
                                </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->    
                    
                    
                    <!--Popup-->
                    <div class="modal fade reassigncabz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Re-assign referrals</div>
                            </div>
                            <div class="post-container">
                                <div id="rerefdisp"></div>
                                
                                    <div class="row">
                                        <div class="form-group col-md-6 col-sm-6">
                                        
                                        <form id="reaxref" method="post">
                                            <div class="post-comment">
                                                <input id="searchrefiv" name="searchrefiv" class="form-control input-group-lg" type="text" title="Enter search word" placeholder="Search username..." />
                                            </div>
                                            <span id="lareazzut"></span><br>
<script>
$(document).ready(function() {
    $('#searchrefiv').keyup(function() {
    document.getElementById("lareazzut").innerHTML = "<img src='./lodaa.gif'>";     
    var sarchreazz = document.getElementById("searchrefiv").value;
    $.post('sarchreaxx_db.php',{sarchword: sarchreazz},function(data) {
        $("#lareazzut").html(data);
    });
});
});
</script>                                             
                                            <div class="post-comment">
                                                <input id="searchpazz" name="searchpazz" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Enter password..." />
                                            </div>
                                            <textarea style="display: none;" id="reveref" name="reveref"></textarea> 
                                            <button style="margin-top: 10px;" class="btn btn-primary " type="submit">Re-assign</button><br>
                                            <span id="loaderef"><img src='./lodaa.gif'></span>
                                            <span id="matchref"></span>
                                        </form> 
                                        
<script>
$('#loaderef').hide();    
$(document).ready(function(){
   $('#reaxref').on('submit', function(elref){
      elref.preventDefault();
      $('#loaderef').show();
      $.ajax({
         url: "reassignuser.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#matchref").html(data);
             $('#loaderef').hide();
            
         }
      });
   });
});
</script>                                            
                                        
                                        </div>
                                    </div>
                                    
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 
                    
                    <?php include("lasupport.php"); ?>