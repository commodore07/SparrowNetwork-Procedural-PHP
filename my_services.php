<div class="modal fade servenz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Services</div>
                            </div>
                            <div class="post-container">
                                
                                <form id="servdoq" method="post">  
                                  <div class="row">
                                    <div class="form-group col-xs-12">
                                        <input class="form-control input-group-lg" name="servamt" id="servamt" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onkeyup="restrictserv('servamt')" maxlength="20" type="text" title="Enter amount" placeholder="Amount" />
                                    </div>
                                  </div>  
                                    
<script>
function restrictserv(elemsav){
	var sxdoq = document.getElementById(elemsav);
	var sgxdoq = new RegExp;
	if(elemsav == "servamt"){
		sgxdoq = /[^0-9]/gi;
	}
	sxdoq.value = sxdoq.value.replace(sgxdoq, "");
}
</script>                                    
                                    
                                  <div class="post-comment">
                                      <textarea id="sazumsg" name="sazumsg" cols="30" rows="10" class="form-control" placeholder="Describe the service rendered..."></textarea>
                                  <div style="margin-top: 10px; margin-bottom: 10px;" class="pull-right">
                                    
                                      <button id="sazuupdate" class="btn btn-primary " type="submit"><i class="fa fa-paper-plane-o"></i> Update</button>
                                  </div>
                                      <div style="height: 14px;" id="sazu_status"></div>
                                      <div id="sazuloada" style="height: 14px;"><img src="./loader2.gif"></div> 
                                  </div>
                                </form>
                                
<script>
     
     $("#sazuupdate").prop("disabled", "disabled");

$("#sazumsg").on("keyup", function () {
  if ($(this).val() != "") {
    $("#sazuupdate").prop("disabled", false);
  } else {
    $("#sazuupdate").prop("disabled", "disabled");
  }
});

$('#sazuloada').hide();
 
 </script>
 
 <script>
$(document).ready(function(){
   $('#servdoq').on('submit', function(e){
       e.preventDefault();
       var sazulastat = document.getElementById("sazu_status");
       $('#sazuloada').show();
      $.ajax({
         url: "sarzi.php?UK=<?php echo $username; ?>",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#sazu_status").html(data);
                // jquery fade-out fade-in begins
                $("#sazu_status").delay(3000).fadeOut("slow", function() {
                    sazulastat.innerHTML = "";	        
                });
                $("#sazu_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
             $('#sazuloada').hide();
         }
      });
      $("#servdoq :input").each( function() {
	   $(this).val('');
	});
        $("#sazuupdate").prop("disabled", "disabled");
  
   });
});
</script>                                   
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  