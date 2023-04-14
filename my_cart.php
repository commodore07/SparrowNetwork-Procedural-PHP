<!--Popup-->
                    <div class="modal fade dacartz" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <div style="color: #999; text-align: center;">Items in cart</div>
                            </div>
                            <div class="post-container">    
                                <div id="cartlogers"></div>
                                
<?php 
$getcoppp = $db->query("SELECT * FROM view_cart WHERE cashier = '$user' ORDER BY id DESC" ) or die($db->error());
$coucopp = $getcoppp->num_rows;
?>                                
<center><button id="clearzax" class="btn btn-primary ">Clear cart</button></center>
<script>
    var coxi = "<?php echo $coucopp; ?>";
    if(coxi > 0){
        $('#clearzax').show(); 
    } else {
        $('#clearzax').hide(); 
    }
</script>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->           
                    
                    
<script>
$(document).ready(function() {
    $('#viewez').click(function() {
    document.getElementById("cartlogers").innerHTML = "<center><img src='./loader2.gif'></center>";    
    var uzee = "<?php echo $user; ?>";
    $.post('carthat.php',{uzee: uzee},function(data) {
        $("#cartlogers").html(data);
    });
});
});
</script>   

<script>
$(document).ready(function() {
    $('#clearzax').click(function() {
    document.getElementById("cartlogers").innerHTML = "<center><img src='./loader2.gif'></center>";        
    $('#clearzax').hide();      
    var uzee = "<?php echo $user; ?>";
    $.post('clearcart.php',{uzee: uzee},function(data) {
        $("#cartlogers").html(data);
    });
});
});
</script>     

                                    <script>
                                    $(document).ready(function(){
                                        $.ajaxSetup({cache: false});
                                      setInterval(function(){
                                          $('#meekaz').load('cart_notify.php');
                                      }, 2000);  
                                    });
                                    </script>  