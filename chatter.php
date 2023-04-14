<!--Popup-->
<div id="chartex" class="modal fade chatmod" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Chat Room</div>
                            </div>
                            <div class="post-container">
                                <div id="chatlee">
                                    
                                </div>
                                
                                <div id="chazynew"></div> 
                                
                                <div id="chatgic">    
                                
                                </div>
                                <div class="post-detail">    
                                    
                                    <center><div style="height: 14px;" id="lachatma"></div></center>  
<?php 
                                                $get_chato = $db->query("SELECT * FROM users WHERE username='$user'");
                                                $get_chax = $get_chato->fetch_assoc();
                                                $chatpix = $get_chax['profilecrop_pic'];
                                                if ($chatpix == "") {
                                                 $chatpix = "./img/default_pic2.jpg";
                                                }
                                                else
                                                {
                                                 $chatpix = "$chatpix";
                                                }
?>                                
                                  <form id="chatzaz" onsubmit="return false">
                                  <textarea style="display: none;" id="id_chat">Photo id</textarea>
                                  <textarea style="display: none;" id="added_chat">Added by</textarea>   
                                  <textarea style="display: none;" id="tima_chat">Time id</textarea>
                                  <div class="post-comment">
                                  <img src="<?php echo $chatpix; ?>" alt="" class="profile-photo-sm" />
                                  <input id="chateec" type="text" class="form-control" placeholder="Post a reply...">
                                  <span style="margin: 5px;">
                                      <button id="chatbtn" onClick='chatmee()' class='btn btn-default' type='submit'><i class= 'fa fa-share'></i></button>
	                          </span>
                                  
<script>
$("#chatbtn").prop("disabled", "disabled");
$("#chateec").on("keyup", function () {
  if ($(this).val() != "") {
    $("#chatbtn").prop("disabled", false);
  } else {
    $("#chatbtn").prop("disabled", "disabled");
  }
});
</script>

                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#lachatma').load('chaxeetaz.php')
                                      }, 2000);  
                                    })
                                    </script>

<script>
$(document).ready(function() {
    $('#chateec').keyup(function() {
    var post = document.getElementById("chateec").value;
    var lachatix = document.getElementById("added_chat").value;
    $.post('stream.php',{post: post,chateez: lachatix
    });
});
});
</script> 
                                  
<script type="text/javascript">
 // Sparrow main Javascript file
function chatmee() {

var meexx = "<?php echo $user; ?>";        
var messagx = $('#chateec').val();    
var oldx = $('#chatgic').html();   
$('#chatgic').html(oldx + '<div class="chat-room"><div class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);"><div class="chat_box touchscroll chat_box_colors_a"><div class="chat_message_wrapper chat_message_right"><ul class="chat_message"><li>@<a href="./'+meexx+'">'+meexx+'</a>&nbsp;<span style="font-size: 11px; color: #999;"><i class="fa fa-clock-o"></i><img src="./lodaa.gif"></span><p style="word-break: normal;">'+messagx+'</p></li></ul></div></div></div></div>');
$('#chartex').scrollTop($('#chartex')[0].scrollHeight);

		var hr = new XMLHttpRequest();
		var url = "chat_proc.php";
                var chateec = document.getElementById("chateec").value;
		var added_chat = document.getElementById("added_chat").value;
	        var id_chat = document.getElementById("id_chat").value;
                var log_toox = document.getElementById("lachatma");
                var tima = document.getElementById("tima_chat").value;
   	        var vars = "getid="+id_chat+"&getU="+added_chat+"&chateec="+chateec+"&tima="+tima;
                $('#chateec').val('');
		hr.open("POST", url, true);
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                hr.onreadystatechange = function() {
	        if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
	            document.getElementById("chatgic").innerHTML = return_data;
                    
                    $('#chartex').scrollTop($('#chartex')[0].scrollHeight);
                    $("#chatbtn").prop("disabled", "disabled");
		// jquery fade-out fade-in begins
                $("#lachatma").delay(500).fadeOut("slow", function() {
                    log_toox.innerHTML = "";	        
                });
                $("#lachatma").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends 
	    }
    }
    hr.send(vars);
    
}
 </script>                          
                                  </div>
                                </form>
                                </div>
                            </div>
                              <div class="modal-footer">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Chat Room</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End--> 