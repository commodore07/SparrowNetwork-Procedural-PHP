<div class="modal fade addbankz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Add bank</div>
                            </div>
                            <div class="post-container">
                                <form name="regbanks" id="regbanks" class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Bank name</label>
                        <input id="bankname" name="bankname" class="form-control input-group-lg" maxlength="30" type="text" title="Name of bank" placeholder="Name of bank" />
                      </div>
                      
                    </div>
                    
                      
                   <div class="row">
                      <div class="form-group col-xs-12">
                        <label>Country</label>
                        <select id="bankcontee" name="bankcontee" class="form-control">
                          <option>Select Country</option>
                          <?php include("country.php"); ?>
                        </select>
                      </div>
                   </div><br>
                    
                      <button class="btn btn-primary">Add</button>
                      <center><div style="height: 14px;" id="bankstat"></div></center>
                  </form>

<script>
$(document).ready(function(){
   $('#regbanks').on('submit', function(curr){
      curr.preventDefault();
      document.getElementById("bankstat").innerHTML = "<img src='./lodaa.gif'>";
      var log_toobanks = document.getElementById("bankstat");
      $.ajax({
         url: "regbanksnow.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#bankstat").html(data);
             $('#bankname').val('');
             
             // jquery fade-out fade-in begins
                $("#bankstat").delay(10000).fadeOut("slow", function() {
                    log_toobanks.innerHTML = "";	        
                });
                $("#bankstat").fadeIn("slow", function() {                    
	        
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