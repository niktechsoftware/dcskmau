<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Day Book Record </h4>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url();?>daybookController/daybook"  method ="post" role="form" id="form">
			     <div class="row"> 
                     <div class="col-md-12 space20">
                        
                            <div class="col-md-3">
                                <h5 class="text-center">Select Session</h5>
                            </div>
                              <div class="col-md-9">
                                  <select name="session_nm" id="session_nm" class="form-control" required="">
                                       <option value="0">-Select Session-</option>
                                       <option value="17">2017</option> 
                                       <option value="18">2018</option>
                                       <option value="19">2019</option>
                                     </select> 
                              </div>
                        </div>     
                    </div> 
				<div class="row"> 
					 <div class="col-md-12 space20">
            			 <div class="col-md-6">
            			 	<div class="col-md-3">
                   				 Start Date</div>
                   				 <div class="col-md-3">
                   				 <input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="st_date" id="st_date" style="width:180px; height:30px;" required/>
                   				</div>
                   		</div>
                   		<div class="col-md-6">
                    		 <div class="col-md-3">
                   				 End Date
                    		</div>
                			<div class="col-md-3">
                    			<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control date-picker" name="end_date" id="end_date" style="width:180px; height:30px;" required/>
                    		</div>
               			</div>               
               		</div>	 
            	</div>
            	<div class="row">
            		 <div class="col-md-12 space20">
            		 	<div class="col-md-4">
            		 			<input type="radio" name="check_list" value="all" required="required">
                       			 All
                    	</div>
                     	<div class="col-md-4">
                        		<input type="radio" name="check_list" value="monthly fee" required="required">
                       			 Monthly Fee
                     	</div>
                     	
                     	<div class="col-md-4">
                        		<input type="radio" name="check_list" value="cash payment" required="required">
                        		Cash Payment
                     	</div>
                    </div>
                 </div>   	
                <div class="row">
               		 <div class="row">
                		 <div class="col-md-12 space20" >
                		   <div style="color: red;"><!-- <?php echo $msg;?> --></div>	
                		 </div>
                    </div>
                </div>		
                <div class="row">
            		 <div class="col-md-12 space20" >
            		 	<div class="col-md-2">
            		 		<label class="radio-inline">
								<input type="radio" class="grey" value="Debit" name="value1" required="required" >
							Debit</label>
						</div>
						<div class="col-md-2">
            		 		<label class="radio-inline">
								<input type="radio" class="grey" value="Credit" name="value1" required="required" >
							Credit</label>
						</div>	
						<div class="col-md-2">
            		 		<label class="radio-inline">
								<input type="radio" class="grey" value="Both" name="value1" required="required" >
							Both</label>
						</div>
                     </div>
                </div>	
                <div class="row">
            		 <div class="col-md-6">
            		 	<div class="col-md-4">
                    			<input type="submit" name="dbd" id="" value="Get Day Book Detail" class="submit btn btn-blue">
                    	</div>
                    </div>
                 </div>   	
           		 </form>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading panel-blue border-light">
			<h4 class="panel-title"> Today Day Book Account</h4>
			</div>
      <?php 
      $view = $this->db->query("select * from opening_closing_balance where opening_date = '".date('Y-m-d')."' AND closing_date = '".date('Y-m-d')."'");
      ?>
			<div class="panel-body">
           <div class="row">
           	<div class="col-md-12"> 
            	<div class="col-md-6">
            		<div class="form-group">
            			<H3 style="margin-left: 100px;">Debit</H3>
            		</div>
            		<div class="form-group">
            			<label class="control-label">Opening Balance</label>
									<?php if ($view->num_rows() >0) { ?>
            			<input type="text" style="margin-left: 100px;" value="<?php echo $openingbalance= $view->opening_balance;?>" disabled="disabled"/>
									<?php } else {?>
            			<input type="text" style="margin-left: 100px;" value="0.00" disabled="disabled"/>
									<?php }?>
            		</div>

            	</div>
            	 <div class="col-md-6">
            	 	<div class="form-group">
            	 		<H3 style="margin-left: 100px;">Credit</H3>
            		</div>
            	 		<div class="form-group">
            			<label class="control-label">
            				<span>Closing Balance</span>
            			</label>
									<?php if ($view->num_rows() >0) {?>
            			<input type="text" style="margin-left: 100px;" value="<?php echo $clossingbalance= $view->closing_balance; ?>" disabled="disabled"/>
									<?php } else {?>
            			<input type="text" style="margin-left: 100px;" value="0.00" disabled="disabled"/>
									<?php }?>
            		</div>
								<div class="form-group">
            			<label class="control-label">Fee &amp; Admission</label>
									<?php if ($view->num_rows() >0) { ?>
            		<input type="text" style="margin-left: 100px;" value ="<?php echo $openingbalance-$clossingbalance ;?>" disabled="disabled"/>
								<?php } else {?>
									<input type="text" style="margin-left: 100px;" value ="0.00" disabled="disabled"/>
									<?php }?>
							
            		</div>
            		
            	</div>
            	</div>
            	</div>
           	</div>
      	</div>
  	</div>
</div>
      
     
