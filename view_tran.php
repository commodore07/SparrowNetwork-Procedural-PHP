                    
<!--Popup-->
                    <div class="modal fade mesellit" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="post-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div style="color: #999; text-align: center;">Transaction</div>
                            </div>
                            
                            <div class="post-container">
                              
                                 <div class="modal-body">
                                     <div id="sellrel"></div> 
                                    
                                     <div >
                                         <form action="datez.php"  method="post">
                                        <textarea style="display: none;" name="cormade" id="ddatit"></textarea>
                                        <textarea style="display: none;" name="laquant" id="ddaqty"></textarea>
                                        <textarea style="display: none;" name="fixid" id="ddid"></textarea>
                                        <?php 
                                        $datula = date('d/m/Y');
                                        if($tandee == "$datula"){
                                        ?>
                                        <center><button style="margin-top: 10px;" class="btn btn-primary " type="submit"><i class="fa fa-recycle"></i> Reverse</button></center>
                                        <?php 
                                        }
                                        ?>
                                     </form>
                                     </div>
                                </div>
    
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!--Popup End-->                       
                    
<!-- image cropping -->
    <script src="js/cropping/main2.js"></script>
    