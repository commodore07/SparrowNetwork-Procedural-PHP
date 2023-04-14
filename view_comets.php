<?php 
$delxid = "$id";
$gettoovee = "(SELECT * FROM post_comments WHERE post_id='$delxid')";
$get_commvee = $db->query($gettoovee);
$incommz = $get_commvee->num_rows;
?> 

<center>
<div id="readcomz" style="text-align: center; font-size: 14px; cursor: pointer;" class="text-green">
    View more comments
</div>  
                                                
<div class="procomz">
    <img src="loader2.gif">
</div>
<div class="msgcommz" style="font-size: 14px;" class="text-green">
                                                    
</div>
</center>

<div id="imgcommz" style="margin-left: 10px; margin-right: 10px;" class="imgcommz"> 

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
                         if (loadclick * 10 > nbrclick){
                             $('.msgcommz').text("No more comment to display");
                             $('.procomz').hide();
                             $('#readcomz').hide();
                         }
                         else{
                         $.post("ajax_loadcommz.php?I=<?php echo $delxid; ?>&T=<?php echo $post; ?>",{load:loadclick},function(data){
                           $('.imgcommz').append(data);
                           $('.procomz').hide();
                           $('#readcomz').hide();
                         });
                     }
                     
                    });
                });
                
                </script>  