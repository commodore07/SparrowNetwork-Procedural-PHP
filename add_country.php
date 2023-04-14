 <!--Popup-->
                    <div class="modal fade addcashie" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Add country</div>
                            </div>
                            <div class="post-container">
                                
                    <form onsubmit="return false" method="post" name="registration_form" id='registration_form' class="form-inline">
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Username</label>
                        <input id="un" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 95 || event.charCode >= 115" onkeyup="restrict('un')" class="form-control input-group-lg" type="text" maxlength="15" title="Enter username" placeholder="Username"/>
                      </div>
<script>
function restrict(elem){
	var tf = document.getElementById(elem);
	var rx = new RegExp;
	if(elem == "un"){
		rx = /[^a-z0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");
}
</script>                            
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Full Name</label>
                        <input id="fn" class="form-control input-group-lg" type="text" maxlength="30" title="Enter full name" placeholder="Full name"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Email</label>
                        <input id="em" class="form-control input-group-lg" type="text" title="Enter Email" placeholder="Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Password 1</label>
                        <input id="pass1" class="form-control input-group-lg" type="password" title="Enter password" placeholder="Enter password"/>
                      </div>
                      <div class="form-group col-xs-6">
                        <label class="sr-only">Password 2</label>
                        <input id="pass2" class="form-control input-group-lg" type="password" title="Repeat Password" placeholder="Repeat Password"/>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Phone</label>
                        <input id="phinakee" maxlength="12" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control input-group-lg" type="text" title="Cashier's phone number" placeholder="Phone Number"/>
                      </div>
                    </div>
                   
                    <div class="form-group gender">
                      <label class="radio-inline">
                          <input type="radio" name="gender" value="Male" checked>Male
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="gender" value="Female">Female
                      </label>
                    </div>
                      
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label class="sr-only">Country</label>
                        <select class="form-control" id="coun">
                          <option value="country" disabled selected>Country</option>
                          <?php include("country.php"); ?>
                        </select>
                      </div>
                    </div>  
                      
                      <button id="signupbtn" onclick="signcountixx()" class="btn btn-primary">Register Now</button>  
                  </form><!--Register Now Form Ends-->
                  
                  <center><div style="height: 14px;" id="signup_status"></div></center>
                        
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->  
                    
<script>
function signcountixx(){
        var hr = new XMLHttpRequest();
	var url = "./signcountry.php";
	var u = document.getElementById("un").value;
        var f = document.getElementById("fn").value;
	var e = document.getElementById("em").value;
	var p1 = document.getElementById("pass1").value;
	var p2 = document.getElementById("pass2").value;
	var c = document.getElementById("coun").value;
	var phin = document.getElementById("phinakee").value;
	var g = $("input[name='gender']:checked").val();
	var status = document.getElementById("signup_status");
	if(u == "" || e == "" || p1 == "" || p2 == "" || f == "" || phin == ""){
		status.innerHTML = "Fill out all of the form data";
                // jquery fade-out fade-in begins
                $("#signup_status").delay(3000).fadeOut("slow", function() {
                    status.innerHTML = "";	        
                });
                $("#signup_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
                // jquery fade-out fade-in begins
                $("#signup_status").delay(3000).fadeOut("slow", function() {
                    status.innerHTML = "";	        
                });
                $("#signup_status").fadeIn("slow", function() {                    
	        
                });
                // jquery fade-out fade-in ends
	}
        else {
    var vars = "uname="+u+"&fname="+f+"&email="+e+"&pass1="+p1+"&pass2="+p2+"&coun="+c+"&sex="+g+"&phon="+phin;
		hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
                    document.getElementById("signup_status").innerHTML = return_data;
                                        $('#un').val('');
                                        $('#fn').val('');
                                        $('#em').val('');
                                        $('#pass1').val('');
                                        $('#pass2').val('');
                                        $('#phinakee').val('');
					               
	    }
    };
    hr.send(vars); 
    document.getElementById("signup_status").innerHTML = "<center><img src='./loader2.gif'></center>";            
        }
}
</script>  