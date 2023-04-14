<?php 
$incommz = "$countox";
?> 

<center>
<div id="readcomz" style="text-align: center; font-size: 14px; cursor: pointer;" class="text-green">
    See more chats
</div>  
                                                
<div class="procomz">
    <img src="loader2.gif">
</div>
<div class="msgcommz" style="font-size: 14px;" class="text-green">
                                                    
</div>
</center>

<div id="imgcommz" class="imgcommz"> 

</div>

                <script>
                
                $(document).ready(function(){
                    $('.procomz').hide();
                    var loadclick = 0;
                    var nbrclick = "<?php echo $incommz; ?>";
                    $("#readcomz").on("click", function () {
                         $('.procomz').show();
                         $('#readcomz').hide();
                         loadclick++;
                         if (loadclick * 50 > nbrclick){
                             $('.msgcommz').text("No more comment to display");
                             $('.procomz').hide();
                             $('#readcomz').hide();
                         }
                         else{
                         $.post("ajax_loadchatz.php?R=<?php echo $reva; ?>&T=<?php echo $timox; ?>",{load:loadclick},function(data){
                           $('.imgcommz').append(data);
                           $('.procomz').hide();
                           $('#readcomz').hide();
                         });
                     }
                     
                    });
                });
                
                </script>  