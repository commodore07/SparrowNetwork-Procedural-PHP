<?php include("php/connectit.php"); ?>
<?php include("user_script.php"); ?> 


<?php 
$follo = strip_tags(@$_POST['follo']);
$follo = $db->real_escape_string($follo); 
 $follo = str_replace("'", "&apos;", $follo);
 
$emm1 = strip_tags(@$_POST['emm1']);
$emm1 = $db->real_escape_string($emm1); 
 $emm1 = str_replace("'", "&apos;", $emm1); 

if ($user != "") {
$get_phot = $db->query("SELECT * FROM posts WHERE id='$follo'");
$check = $get_phot->num_rows;
$rollin = $get_phot->fetch_assoc();
$bdee = $rollin['body'];
$vee1 = $rollin['vee1'];
if($emm1 == "tradefairpic"){
//// GET PRICE
$get_prixe = $db->query("SELECT * FROM tradefair WHERE brand='$vee1'");
$rollex = $get_prixe->fetch_assoc();
$pixxe = $rollex['price'];
$nixxe = $rollex['name'];
$quantee = $rollex['item_qty'];
//// END GET PRICE
}
if ($check > 0) {
?>    
                 <form id="formediii" method="post">  
<?php 
if($emm1 == "tradefairpic"){
?>                     
                     <div class="row">
                      <div class="form-group col-xs-12">
                          <input name="tradnam" id="tradname" class="form-control input-group-lg" maxlength="20" type="text" title="Enter product name" value="<?php echo $nixxe; ?>" placeholder="Product Name" />
                      </div>
                    </div>
                    
                     <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="kior" onkeyup="restrict('kior')" name="tradtag" value="<?php echo $pixxe; ?>" type="text" title="Enter price tag" placeholder="Price Tag" />
                      </div>
                    </div>
                     
                     <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" id="quanx" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrict('quanx')" name="quanx" type="text" title="Enter quantity" value="<?php echo $quantee; ?>" placeholder="Quantity" />
                      </div>
                    </div>
<script>
function restrict(elem){
	var tf = document.getElementById(elem);
	var rx = new RegExp;
	if(elem == "kior"){
		rx = /[^0-9]/gi;
	} else if(elem == "quanx"){
		rx = /[^0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
</script> 
<?php 
}
?>
                    <div class="row">
                      <div class="form-group col-xs-12">
                          <textarea class="form-control" name="tradex" id="ladez" title="Describe product" placeholder="Description" rows="4" cols="400"><?php echo $bdee; ?></textarea>
                      </div>
                    </div>
                                        <button  id="tradsubmit" class="btn btn-primary " type="submit">Update</button>
                                        <div id="tradpicrot" class="pull-right"><img src="loader2.gif"></div>
                                        <div id="eviizo" class="pull-right"></div>
                 </form>
<?php 
if($emm1 == "tradefairpic"){
?>
<script>
$('#tradpicrot').hide();    
$(document).ready(function() {
    $('#formediii').on('submit', function(e){
      e.preventDefault();
    $('#tradpicrot').show();     
    var follo = "<?php echo $follo; ?>";
    var veez1 = "<?php echo $vee1; ?>";
    var tradname = document.getElementById("tradname").value;
    var kior = document.getElementById("kior").value;
    var ladez = document.getElementById("ladez").value;
    var quantex = document.getElementById("quanx").value;
    $.post('editmicro.php',{follo: follo, tradname: tradname, kior: kior, ladez: ladez, veez1: veez1, quantex: quantex},function(data) {
        $("#eviizo").html(data);
        $('#tradpicrot').hide(); 
    });
});
});
</script> 
<?php
} else {
?>
<script>
$('#tradpicrot').hide();    
$(document).ready(function() {
    $('#formediii').on('submit', function(e){
      e.preventDefault();
    $('#tradpicrot').show();     
    var follo = "<?php echo $follo; ?>";
    var ladez = document.getElementById("ladez").value;
    $.post('editmicrochirp.php',{follo: follo, ladez: ladez},function(data) {
        $("#eviizo").html(data);
        $('#tradpicrot').hide(); 
    });
});
});
</script> 
<?php
}
}
}
?>



