
<!--Popup-->
                    <div class="modal fade suppot" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Register a sparrow support</div>
                            </div>
                            <div class="post-container">
                                
                                <form id="reasupp" method="post">
                                            <div class="post-comment">
                                                <input id="searchsupp" name="searchsupp" class="form-control input-group-lg" type="text" title="Enter search word" placeholder="Search username..." />
                                            </div>
                                            <span id="supprezzut"></span><br>
<script>
$(document).ready(function() {
    $('#searchsupp').keyup(function() {
    document.getElementById("supprezzut").innerHTML = "<img src='./lodaa.gif'>";     
    var sarchreazz = document.getElementById("searchsupp").value;
    $.post('sarchreaxx_db.php',{sarchword: sarchreazz},function(data) {
        $("#supprezzut").html(data);
    });
});
});
</script>                                             
                                            <button style="margin-top: 10px;" class="btn btn-primary " type="submit">Register</button>
                                            <span id="matchsuppp"></span>
                                        </form> 
                                        
<script>   
$(document).ready(function(){
   $('#reasupp').on('submit', function(elsupp){
      document.getElementById("matchsuppp").innerHTML = "<img src='./lodaa.gif'>";    
      elsupp.preventDefault();
      $.ajax({
         url: "addsupport.php",
         type: "POST",
         data: new FormData(this),
         contentType: false,
         processData: false,
         success: function(data)
         {
             $("#matchsuppp").html(data);
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