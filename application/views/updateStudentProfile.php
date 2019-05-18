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
					
						 <div class="panel-body" >
							
									<?php 
										$r=$rollarray->row();
										
										?>
								 <form action="<?php echo base_url();?>index.php/newAdmissionController/updateStudentProfile"  method ="post" role="form" id="form">		
									<input type="hidden" name="stud_id" value="<?php echo $r->roll_number;?>">
									<input type="hidden" name="sno" value="<?php echo $r->sno;?>">	
											<div class="row">
						<div class="col-md-12">
							<div class="errorHandler alert alert-danger no-display">
								<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
							</div>
							<div class="successHandler alert alert-success no-display">
								<i class="fa fa-ok"></i> Your form validation is successful!
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Student Update Profile</h4>
																		</div><br>																	
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo $r->name;?>" class="form-control" id="name" name="name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Father Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo $r->father_name;?>" class="form-control"  name="fatherName" required ="required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Mother Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php  echo $r->mother_name;?>" class="form-control"  name="motherName">
									</div>
								</div>
								
								
							</div>
							<div class="row">
								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Mobile Number <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php  echo $r->mobile_number;?>" class="form-control"  name="mobile" required ="mobile">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Address <span class="symbol"></span>
										</label>
										<input type="text" value="<?php  echo $r->address;?>" class="form-control"  name="address">
									</div>
								</div>
								
								
							</div>
						
						
							
							<div class="row">
								
								
								<div class="col-md-3">
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										
										<button type ="submit">Submit</button>
										
									</div>
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
									

