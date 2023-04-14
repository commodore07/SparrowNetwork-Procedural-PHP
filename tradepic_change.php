                    
<!--Popup-->
                    <div class="modal fade tradeupz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Add tradefair products</div>
                            </div>
                            
                            <div class="post-container">
                              
                                <div class="modal-body">
                                    <form id="tradz_back" method="post" action="tradefair_uplodz.php">
                                    <div>  
                    <div class="row">
                      <div class="form-group col-xs-6">
                          <select name="tradcat" class="form-control input-group-lg">
<option value="" selected="selected">Select Category</option>
<option>Electronic</option>
<option>Fashion</option>
<option>Cosmetic</option>
<option>Food</option>
<option>E-book</option>
<option>Car</option>
<option>Furniture</option>
<option>Building Material</option>
<option>Home Utensil</option>
<option>House</option>
<option>Jewellery</option>
<option>Deodorants</option>
<option>Others</option>
</select>
                      </div>
                      <div class="form-group col-xs-6">
                          <select name="tradcon" class="form-control" >
<option value="" selected="selected">Select Physical Condition</option>
<option>Brand New</option>
<option>Fairly Used</option>
</select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input name="tradnam" class="form-control input-group-lg" maxlength="20" type="text" title="Enter product name" placeholder="Product Name" />
                      </div>
                    </div>
                                        
                   <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" id="costkior" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrictaz('costkior')" name="costkior" type="text" title="Enter price tag" placeholder="Cost Price" />
                      </div>
                    </div>                     
                      
                   <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8"  id="kior" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrictaz('kior')" name="tradtag" type="text" title="Enter price tag" placeholder="Selling Price" />
                      </div>
                    </div>
<script>
function restrictaz(elemaz){
	var tfaz = document.getElementById(elemaz);
	var rxaz = new RegExp;
	if(elemaz == "kior"){
		rxaz = /[^0-9]/gi;
	} else if(elemaz == "costkior"){
		rxaz = /[^0-9]/gi;
	} else if(elemaz == "quanx"){
		rxaz = /[^0-9]/gi;
	}
	tfaz.value = tfaz.value.replace(rxaz, "");
}
</script>

                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" id="quanx" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  onkeyup="restrictaz('quanx')" name="quanx" type="text" title="Enter quantity" placeholder="Quantity" />
                      </div>
                    </div>

                      <div class="row">
                      <div class="form-group col-xs-12">
                          <textarea class="form-control" name="tradex" id="ladez" title="Describe product" placeholder="Description" rows="4" cols="400"></textarea>
                      </div>
                    </div>
                                    
                      </div>
                            <!-- image cropping -->
                                  <div class="col-md-8">
                                    <!-- <h3 class="page-header">Demo:</h3> -->
                                    <div class="img-contain">
                                        <img src="img/default_pic.jpg" alt="Picture">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <!-- <h3 class="page-header">Preview:</h3> -->
                                    <div class="docs-preview clearfix">
                                        <div class="img-previewer preview-lg"></div>
                                      
                                    </div>
                                    <!-- <h3 class="page-header">Data:</h3> -->
                                    
                                    <div class="docs-data">
                                      <div class="input-group">
                                          <input class="form-control" id="datzX" name="xaxis" type="hidden" placeholder="x">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="datzY" name="yaxis" type="hidden" placeholder="y">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="dataWiz" name="width" type="hidden" placeholder="width">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="dataHeiz" name="height" type="hidden" placeholder="height">
                                      </div>
                                    </div>
                                    <div>
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Upload image" style="font-size: 20px;"></i>   <input name="avatarInput" id="inputBack" type="file" style="display: none;">
                                    </label>
                                        <button  id="tradsubmit" class="btn btn-primary " type="submit">Upload</button>
                                        <div class="tradpicrot"><img src="loader2.gif"></div>
                                    <div style="font-size: 14px; height: 15px; margin-bottom: 15px; color: #999;" id="tradstat"></div>
                                    </div>
                                    
                                  </div> 
                            </form>
                            <!-- /image cropping -->    
                                </div>
<script>  
$("#tradsubmit").prop("disabled", "disabled");
$("#ladez").on("keyup", function () {
  if ($(this).val() != "") {
    $("#tradsubmit").prop("disabled", false);
  } else {
    $("#tradsubmit").prop("disabled", "disabled");
  }
});
</script>
                                
 <script>
$(document).ready(function(){
   $('.tradpicrot').hide(); 
   $('#tradz_back').on('submit', function(e){
      e.preventDefault();
      $('.tradpicrot').show(); 
      $.ajax({
         url: "tradefair_uplodz.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $('.tradpicrot').hide(); 
             $("#tradstat").html(data);
             
        $("#tradz_back :input").each( function() {
	   $(this).val('');
	});
                $("#tradsubmit").prop("disabled", "disabled");
                // jquery fade-out fade-in begins
                var log_pass = document.getElementById("tradstat");
                $("#tradstat").delay(3000).fadeOut("slow", function() {
                    log_pass.innerHTML = "";	        
                });
                $("#tradstat").fadeIn("slow", function() {                    
	        
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
                    
<!-- image cropping -->
    <script src="js/cropping/cropper.min.js"></script>
    <script src="js/cropping/trader.js"></script>  