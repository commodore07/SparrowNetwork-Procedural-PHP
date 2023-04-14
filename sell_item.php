                    
<!--Popup-->
                    <div class="modal fade mesellit" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Sell this item</div>
                            </div>
                            
                            <div class="post-container">
                              
                                 <div class="modal-body">
                                     <div id="sellrel"></div> 
                                    
                                     <form id="uploaditax" method="post" enctype="multipart/form-data">
                                     <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="selltag" onkeyup="restrict('selltag')" name="selltag" type="text" title="Enter price tag" placeholder="Selling price" />
                      </div>
                    </div>
<script>
function restrict(elem){
	var tf = document.getElementById(elem);
	var rx = new RegExp;
	if(elem == "selltag"){
		rx = /[^0-9]/gi;
	} else if(elem == "sellqty"){
		rx = /[^0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
</script>

                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" maxlength="8" id="sellqty" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrict('sellqty')" name="sellqty" type="text" title="Enter quantity" placeholder="Quantity" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" name="sellid" id="sellid"  type="text" title="Enter product id" placeholder="Product id" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" name="cus_name" id="cus_name"  type="text" title="Enter customer's name" placeholder="Customer name" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-xs-12">
                          <input class="form-control input-group-lg" name="cus_no" maxlength="12" id="cus_no"  type="text" title="Enter phone number" placeholder="Phone number" />
                      </div>
                    </div>

<textarea style="display: none;" name="cormade" id="ddatit"></textarea>
                                     
                            <!-- image cropping -->
                                  <div class="col-md-8">
                                    <!-- <h3 class="page-header">Demo:</h3> -->
                                    <div id="conzz" class="img-container">
                                        <img src="img/default_pic.jpg" alt="Picture">
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <!-- <h3 class="page-header">Preview:</h3> -->
                                    <div class="docs-preview clearfix">
                                        <div id="sazz" class="img-preview preview-lg"></div>
                                      
                                    </div>
                                    <!-- <h3 class="page-header">Data:</h3> -->
                                    
                                    <div class="docs-data">
                                      <div class="input-group">
                                          <input class="form-control" name="dataX" id="dataX" type="hidden" placeholder="x">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" name="dataY" id="dataY" type="hidden" placeholder="y">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" name="dataWidth" id="dataWidth" type="hidden" placeholder="width">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" name="dataHeight" id="dataHeight" type="hidden" placeholder="height">
                                      </div>
                                    </div>
                                    <div>
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Upload image" style="font-size: 20px;"></i>   <input name="avatarInput" id="inputImage" type="file" style="display: none;">
                                    </label>
                                        <button class="btn btn-primary " type="submit"><i class="fa fa-money"></i> Sell</button>
                                    <div style="height: 25px;">
                                    <div id="loadeaq"><img src="./loader2.gif"></div> 
                                    <div style="font-size: 14px; height: 15px; margin-bottom: 15px; color: #999;" id="stanleaq"></div>
                                    </div>
                                    
                                    </div>
                                    
                                  </div> 
                                     </form>
                            <!-- /image cropping -->    
                                </div>
<script>
$('#loadeaq').hide();    
$(document).ready(function(){
   $('#uploaditax').on('submit', function(e){
    e.preventDefault();  
      $('#clearzax').show();
      $('#loadeaq').show();
      $.ajax({
         url: "file_upload_sell.php?SA=<?php echo $username; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#stanleaq").html(data); 
                // jquery fade-out fade-in begins
                $("#stanleaq").delay(8000).fadeOut("slow", function() {
                    var log_kee = document.getElementById("stanleaq");
                    log_kee.innerHTML = "";	        
                });
                $("#stanleaq").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends  
             $('#loadeaq').hide();
             $('#selltag').val('');
             $('#sellqty').val('');
             $('#sellid').val('');
             $('#cus_name').val('');
             $('#cus_no').val('');
             $('#inputImage').val('');
             
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
    <script src="js/cropping/main2.js"></script>
    