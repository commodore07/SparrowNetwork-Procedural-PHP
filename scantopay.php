 <!--Popup-->
                    <div class="modal fade addcashiekkk" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Zenith scan to pay</div>
                            </div>
                            <div class="post-container">
                                <img style="max-width: 100%; margin-bottom: 10px;" class="img-rounded" src="./images/scantopay.jpg">  
                                <form id="zenithform" method="post">
                                    <label class="btn btn-default btn-file">
                                        <i class="glyphicon glyphicon-camera" title="Zenith scan to pay QR Code" style="font-size: 20px;"></i>   <input name="zenscan" type="file" style="display: none;">
                                    </label>
                                    <div class="pull-right" id="zenloadz"><img src="./loader2.gif"></div>
                                    <div class="pull-right" id="zenresut"></div>
                                    <button class="btn btn-primary " type="submit">Upload</button>
                                </form> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
<script>
$('#zenloadz').hide();    
$(document).ready(function(){
   $('#zenithform').on('submit', function(e){
      e.preventDefault();
      $('#zenloadz').show();
      $.ajax({
         url: "send_zenith.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#zenresut").html(data);
             $('#zenloadz').hide();
             $("#zenithform :input").each( function() {
	   $(this).val('');
	});
         }
      });
   });
});
</script>                        