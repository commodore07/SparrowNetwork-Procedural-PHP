<?php 
// Email the user their activation link
                $to = "$emailo";							 
		$from = "info@sparrownetwork.net";
		$subject = "$subolo";
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Sparrow Network</title></head>
		<body>
		<div>
		<img style="width: 160px; margin-top: 10px; margin-left: 50px; margin-right: 0px;" src="http://sparrownetwork.net/images/sparrow_logo.png">

	

<div class="row" style="padding: 30px; background-color: #f7f7f7;">
                               
                            
                        <div class="col-md-6">
                            
                            
                                        <div class="row">
                                        <div class="col-md-12">
		  			<div style="background-color: #00BFFF; margin-bottom:5px; border-radius:10px; padding:2px; border-left:1px solid #eee; border-top:1px solid #eee; border-right:2px solid #eee; border-bottom:2px solid #eee;" class="content-box-large">
		  				
		  				<div class="panel-body" style="height: 35px;">
                                                    <p style="margin-top: 10px; font-size: 20px; color: #fff; text-align: center;"><i class="fa fa-comment-o"></i>Sparrow Network</p>
                                                    
                                                </div>
                                        </div>
                                        </div>
                                        </div>
                        </div>
    
    <div class="col-md-6">
                            
                            
                                        <div class="row">
                                        <div class="col-md-12">
		  			<div style="background-color: #fff; margin-bottom:5px; border-radius:10px; padding:2px; border-left:1px solid #eee; border-top:1px solid #eee; border-right:2px solid #eee; border-bottom:2px solid #eee;" class="content-box-large">
		  				
		  				<div class="panel-body" >
                                                    <p style="margin-top: 10px; font-size: 18px; color: #999; text-align: center;"> Greetings from Sparrow Network</p>
                                                    <p style="padding: 20px; font-size: 16px;">' .$mailbod. '
                                                    </p>
                                                    
                                                </div>
                                        </div>
                                        </div>
                                        </div>
                        </div>
    
</div>
		
		</div>
		</body>
		</html>';
		$headers = "From: $from\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		//////////////////////////////////////    
?>