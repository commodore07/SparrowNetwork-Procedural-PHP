<!--Popup-->
                    <div class="modal fade modal-007" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Update profile photo</div>
                            </div>
                            
                            <div class="post-container">
                              
                                <div class="modal-body">
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
                                    <form id="upload_form" action="file_upload_parser.php" method="post" enctype="multipart/form-data">
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
                                    <button class="btn btn-primary " type="submit">Upload</button>
                                    <div style="height: 25px;">
                                    <div id="loaderix"><img src="./loader2.gif"></div> 
                                    <div style="font-size: 14px; height: 15px; margin-bottom: 15px; color: #999;" id="stanlee"></div>
                                    </div>
                                    
                                    </div>
                                    </form>
                                  </div> 
                            <!-- /image cropping -->    
                                </div>
                                
                                
<script>
$('#loaderix').hide();    
$(document).ready(function(){
   $('#upload_form_revisit').on('submit', function(){
      
      $('#loaderix').show();
      $.ajax({
         url: "file_upload_parser.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#stanlee").html(data);
                // jquery fade-out fade-in begins
                $("#stanlee").delay(3000).fadeOut("slow", function() {
                    var log_kee = document.getElementById("stanlee");
                    log_kee.innerHTML = "";	        
                });
                $("#stanlee").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends        
             $('#loaderix').hide();
             $("#upload_form :input").each( function() {
	   $(this).val('');
	});
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
                    
<!--Popup-->
                    <div class="modal fade modal-010" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Update background photo</div>
                            </div>
                            
                            <div class="post-container">
                              
                                <div class="modal-body">
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
                                    <form action="file_upload_background.php" id="upload_back" method="post" enctype="multipart/form-data">
                                    <div class="docs-data">
                                      <div class="input-group">
                                          <input class="form-control" name="datzX" id="datzX" type="hidden" placeholder="x">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="datzY" name="datzY" type="hidden" placeholder="y">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="dataWiz" name="dataWiz" type="hidden" placeholder="width">
                                      </div>
                                      <div class="input-group">
                                          <input class="form-control" id="dataHeiz" name="dataHeiz" type="hidden" placeholder="height">
                                      </div>
                                    </div>
                                    <div>
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Upload image" style="font-size: 20px;"></i>   <input name="Inputval" id="inputBack" type="file" style="display: none;">
                                    </label>
                                    <button onclick="uploadBackgggg()" class="btn btn-primary " type="submit">Upload</button>
                                    <div style="font-size: 14px; height: 15px; margin-bottom: 15px; color: #999;" id="stanxee"></div>
                                    </div>
                                    </form>
                                  </div> 
                            <!-- /image cropping -->    
                                </div>
                                                            
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->                       
                    
<!-- image cropping -->
    <script src="js/cropping/cropper.min.js"></script>
    <script src="js/cropping/main2.js"></script>
    <script src="js/cropping/main3.js"></script>   