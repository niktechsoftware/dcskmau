<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<div class="panel-tools">										
					<div class="dropdown">
					<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
						<i class="fa fa-cog"></i>
					</a>
					<ul class="dropdown-menu dropdown-light pull-right" role="menu">
						<li>
							<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
						</li>
						<li>
							<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
						</li>
						<li>
							<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
						</li>										
					</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
					
						<div class="panel panel-calendar">
							<form action="<?php echo base_url();?>index.php/newAdmissionController/updateStudentFeeStatus"  method ="post" role="form" id="form" enctype="multipart/form-data">
							<div class="panel-body">
								<div class="panel panel-calendar">
																		<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Enter Roll Number</h4>
																		</div>
																		
																		<div class="panel-body">
																		
																			<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Student Rollnumber<span class="symbol"></span>
										</label>
										<input type="text" id="rollNo" name="rollNo" required="required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Security Code <span class="symbol required"></span>
										</label>
										<input type="text" id="scode" name="scode" required="required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Leaser Number <span class="symbol"></span>
										</label>
										<input type="text" id="leaserNo" name="leaserNo" required="required">
									</div>
								</div>
								
								
							</div>
							<div class="row">
								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Photo <span class="symbol required"></span>
										</label>
										 <input type="file" id="stu_photo" name="stuImage" required="required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Signature <span class="symbol required"></span>
										</label>
										 <input type="file" id="sig" name="signature" >
									</div>
								</div>
							<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Fee Submit Date 
										</label>
										 <input type="date" id="date" name="feeSubmitDate">
									</div>
								</div>
								
								
							</div>
							<br>
																					<div class="text-black text-large">
																				
																			<input type="submit"  value="Submit" class="submit btn btn-blue">
																					</div>
																					<br>
																					<lable> <font size="3" color="red"> <?php if($this->uri->segment(3)==7){
																				echo "Fee Sucessfully Submitted";
																			}
																			elseif($this->uri->segment(3)==9){
																				echo"Roll Number Or Scode is wrong";
																			}
																			?>
																			</font> </lable>
							
						</div>
																		
																			
																	
																					
																		</div>
																	</div>
																</div>
								</form>
				               
								</div>
							</div>
							
						
						</div>		
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
									

