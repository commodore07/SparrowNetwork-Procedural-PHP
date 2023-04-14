<?php 
if($username != "$user" && $user != ""){
?>
<li><a style="cursor: pointer;" data-toggle="modal" data-target=".spartext"><i class="fa fa-paper-plane-o"></i> Message</a></li>
<?php 
}
?>
<!--Popup-->
                    <div class="modal fade spartext" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Send message to <?php echo $username; ?></div>
                            </div>
                            <div class="post-container">
                                <form id="fommsg" method="post">   
                                  <div class="post-comment">
                                      <textarea id="msgdec" name="msgdec" cols="30" rows="10" class="form-control" placeholder="Type in message..."></textarea>
                                  <div style="margin-top: 10px; margin-bottom: 10px;" class="pull-right">
                                    
                                      <button id="gomessage" name="gomessage" class="btn btn-primary " type="submit"><i class="fa fa-paper-plane-o"></i> Send Message</button>
                                  </div>
                                      <div style="height: 14px;" id="msg_status"></div>
                                  <div style="height: 14px;" id="msg_loada"><img src="./loader2.gif"></div> 
                                  </div>
                                </form>
                                
                                  
                                  
                                
                                
<script>
     
     $("#gomessage").prop("disabled", "disabled");

$("#msgdec").on("keyup", function () {
  if ($(this).val() != "") {
    $("#gomessage").prop("disabled", false);
  } else {
    $("#gomessage").prop("disabled", "disabled");
  }
});

$('#msg_loada').hide();
 
 </script>
 
 <script>
$(document).ready(function(){
   $('#fommsg').on('submit', function(e){
       e.preventDefault();
       var msgstat = document.getElementById("msg_status");
       $('#msg_loada').show();
      $.ajax({
         url: "msg.php?U=<?php echo $username; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#msg_status").html(data);
                // jquery fade-out fade-in begins
                $("#msg_status").delay(3000).fadeOut("slow", function() {
                    msgstat.innerHTML = "";	        
                });
                $("#msg_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
             $('#msg_loada').hide();
         }
      });
      $("#fommsg :input").each( function() {
	   $(this).val('');
	});
        $("#gomessage").prop("disabled", "disabled");
  
   });
});
</script>   
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->     