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
							<form action="<?php echo base_url();?>index.php/login/newAdmission1"  method ="post" role="form" id="form">
							<div class="panel-body">
								<div class="panel panel-calendar">
																		<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Enter Roll Number</h4>
																		</div>
																		<div class="panel-body">
																			<div class="text-black text-large">
																				<input type="text" id="rollNo" name="rollNo" value="<?php if($isvalue!="null"){echo $stud_id;}?>">
																			<input type="submit" name="studentId" value="Submit" class="submit btn btn-blue">
<lable> <font size="4" color="red"> <?php if($this->uri->segment(3)==9){
																				echo "Roll Noumber Already Exist";
																			}
																			?>
																			</font> </lable>
																					</div>
																		</div>
																	</div>
																</div>
								</form>
				                <div class="panel-body" >
				               
									<?php if($isvalue!='null'){
										if($rollarray!="null"){$r=$rollarray->row();}else{$r="null";}
										
										?>
								 <form action="<?php echo base_url();?>index.php/newAdmissionController/addStudent"  method ="post" role="form" id="form" enctype="multipart/form-data" >		
						<input type="hidden" name="stud_id" value="<?php echo $stud_id; ?>">	
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
							<div class="row">
							<table><tr>
							<td>
							<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->name;}?>" class="form-control" id="name" name="name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Father Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->father;}?>" class="form-control"  name="fatherName" required ="required">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Mother Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->mother;}?>" class="form-control"  name="motherName">
									</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group">
										<label class="control-label">
											Leaser Number <span class="symbol"></span>
										</label>
										<input type="text" class="form-control"  name="leaserNo">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Mobile Number <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->mobile;}?>" class="form-control"  name="mobile" required ="mobile">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Address <span class="symbol"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->address;}?>" class="form-control"  name="address">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Aadhar Number <span class="symbol"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->adhar_number;}?>" class="form-control"  name="adhar_number">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											DOB<span class="symbol"></span>
										</label>
										<input type="text" value="<?php if($r!="null"){ echo $r->dob;}?>" class="form-control"  name="dob">
									</div>
								</div>
								
							</td>
							<td valign="top" >
							<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">
											Student Photo 
										</label>
									<?php if($r=="null"){ 
								?>	<input type="file" name="stuImage" />
								<?php } else{ ?>
								
								
											<img src="http://dcskmau.com/exam/photo/<?php echo $r->photo;?>" width="120" height="100">
											<input type="hidden" class="form-control"  name="stuImage" value="<?php echo $r->photo;?>"  style="width:160px;" >
										
										<?php } ?>
									</div>
								</div>
								</td>
								</tr>
							</table>
								
						
							</div>
								
						
							
						
						
							<div class="panel-body">
								<div class="panel panel-calendar">
																		<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Student Detail</h4>
																		</div>
																		
																	</div>
																</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Course <span class="symbol"></span>
										</label>
										<select class="form-control" id="programm_name" name ="programm_name">
										<option value="">Select Programm</option>
		                                   <?php $query = $this->db->query('SELECT DISTINCT programm_name FROM  program_details');
		                                            foreach ($query->result() as $row):														
													?>
														<option value="<?php echo $row->programm_name;?>"><?php echo $row->programm_name;?> </option>
													<?php endforeach;?>
		                                     
	                                	</select>
										
									</div>
								</div>
								
						
							
							    
							
								
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Year <span class="symbol"></span>
										</label>
										<select class="form-control" name="year" id="yr">
										<option value="">Select Year</option>
		                                      <?php $query = $this->db->query('SELECT DISTINCT program_code FROM  program_details');
		                                            foreach ($query->result() as $row):														
													?>
														<option value="<?php echo $row->program_code;?>"><?php echo $row->program_code;?> </option>
													<?php endforeach;?>
		                                     
	                                	</select>
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Subject 1 <span class="symbol"></span>
										</label>
										<select class="form-control" name="subject1" id="sub1">
										
		                                     
	                                	</select>
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Subject 2 <span class="symbol"></span>
										</label>
										<select class="form-control" name="subject2" id="sub2">
										
		                                     
	                                	</select>
										
									</div>
								</div>
								
							</div>
							<div class="row">
								
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Subject 3 <span class="symbol"></span>
										</label>
										<select class="form-control" name="subject3" id="sub3" >
		                                     
		                                     
	                                	</select>
										
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Gender <span class="symbol"></span>
										</label>
										<select class="form-control" name="gender" id="gen" >
		                                      <?php $query = $this->db->query('SELECT DISTINCT gender FROM  program_details');
		                                     ?> <option value="">Select gender</option>
		                                        <?php     foreach ($query->result() as $row):														
													?>
														<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?> </option>
													<?php endforeach;?>
		                                     
	                                	</select>
										
									</div>
								</div>
								
								
								
								
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Category <span class="symbol"></span>
										</label>
										<select class="form-control" name="category" id="cate1">
		                                      <option value="">Select Category</option>
		                                      <option value="GEN">GEN</option>
		                                       <option value="OBC">OBC</option>
		                                        <option value="SC">SC</option>
		                                         <option value="ST">ST</option>
		                                     
	                                	</select>
									
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											 <span class="symbol" >Payble amount</span>
											 	</label>
											 <input type="text" value="" id="showFee" class="form-control"  name="payblamount">
									
									
										
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
									<?php }?>
								</div>
							</div>
							
						
						</div>		
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>
									

