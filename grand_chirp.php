                    <!--Popup-->
                    <div class="modal fade grandchirp" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <div style="color: #999; text-align: center;">Grand Chirp</div>
                            </div>
                            <div class="post-container">
                                <form id="upgForm" method="post">   
                                  <div class="post-comment">
                                      <input name="tiitoo" style="margin-bottom: 10px;" class="form-control input-group-lg" type="text" title="Enter title" placeholder="Enter title..." />
                                      <textarea name="gpost" id="gpost" style="margin-bottom: 10px;" cols="30" rows="10" class="form-control" placeholder="Express yourself..."></textarea>
                                      <input name="gtube" class="form-control input-group-lg" type="text" title="Enter youtube URL..." placeholder="Enter youtube URL..." />
                                      <label style="cursor: pointer;" class="btn btn-file">
                                        <i class="fa fa-camera" title="Upload photo"></i>  <input name="grandfile" type="file" style="display: none;">
                                      </label>
                                      <label style="cursor: pointer;" class="btn btn-file">
                                        <i class="fa fa-camera-retro" title="Upload multiple photos"></i>  <input type="file" name="gfiles[]" multiple style="display: none;">
                                      </label>
                                      <span id="loadvee"><img src="./loader2.gif"></span> 
                                      <span id="susmsg" style="height: 14px;"></span>
                                  <div style="margin-top: 10px; margin-bottom: 10px;" class="pull-right">
                                    
                                      <button id="gbut" class="btn btn-primary " type="submit">Chirp</button>
                                  </div>
                                  </div>
                                </form>
                                <div id="gchirp_resut"></div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->
                    
<script>   
$("#gbut").prop("disabled", "disabled");

$("#gpost").on("keyup", function () {
  if ($(this).val() != "") {
    $("#gbut").prop("disabled", false);
  } else {
    $("#gbut").prop("disabled", "disabled");
  }
});

$('#loadvee').hide();
</script>   

<script>
$(document).ready(function(){
   $('#upgForm').on('submit', function(e){
      e.preventDefault();
      $('#loadvee').show();
      $.ajax({
         url: "send_gpost.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#susmsg").html(data);
                // jquery fade-out fade-in begins
                var msgsax = document.getElementById("susmsg");
                $("#susmsg").delay(3000).fadeOut("slow", function() {
                    msgsax.innerHTML = "";	        
                });
                $("#susmsg").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
             $('#loadvee').hide();
             $("#gbut").prop("disabled", "disabled");
             $("#upgForm :input").each( function() {
	   $(this).val('');
	});
         }
      });
   });
});
</script>    