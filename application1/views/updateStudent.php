						
<div class="row">
							<div class="col-md-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Transaction  <span class="text-bold">Panel</span></h4>
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
														<a class="panel-refresh" href="#">
															<i class="fa fa-refresh"></i> <span>Refresh</span>
														</a>
													</li>
													<li>
														<a class="panel-config" href="#panel-config" data-toggle="modal">
															<i class="fa fa-wrench"></i> <span>Configurations</span>
														</a>
													</li>
													<li>
														<a class="panel-expand" href="#">
															<i class="fa fa-expand"></i> <span>Fullscreen</span>
														</a>
													</li>
												</ul>
											</div>
											<a class="btn btn-xs btn-link panel-close" href="#">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
		
		<div class="panel-body">
								<div class="alert alert-success">
											<p>
												Welcome to DCSK MAU.This is Transactional Panel where you can save Update Students Record.
												
											</p>
									</div>
									<?php $id = $this->uri->segment(3); 
									if($id=="true"){
									    echo "Record sucessfully updated";
									}
									?>
									<form action="<?php echo base_url();?>index.php/login/getRecord"  method ="post" role="form" class="form-horizontal" id="form">
									
									<div class="form-group">
									<div class="row">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Enter student ID  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="test" style='text-transform:uppercase' class="form-control"  name="bstnumber"  value ="<?php if($bst!=0){ echo $bst;}?>" required="required" >
													</div>
												</div>
												<div class="col-sm-4">
													  <div class="col-md-4">
	                  
	                    									<input type="submit" value="Get Data" class="btn btn-success">
	                    							</div>
												</div>
													Please Enter A Valid Student ID!!!!!
												</div>
									</div>
								</form>
								
								
								<div>
								<?php if($bst!=0){
									$this->db->where("roll_number",$bst);
									$val = $this->db->get("student_info")->row();
								?>
								<div class="panel-body">
								<div class="alert alert-success">
											<p>
												Welcome to DCSK MAU.
												
											</p>
									</div>
									
								
								<form action="<?php echo base_url();?>index.php/login/saveUpdate"  method ="post" role="form" class="form-horizontal" id="form" enctype="multipart/form-data">
							
								<div>
								
									<div class="form-group">
									<div class="row">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Student Name  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text"  class="form-control" id="patientName" name="patientName" value="<?php echo $val->name;?>" required="required" >
														
														<input type="hidden" name ="student_id" value="<?php echo $val->roll_number;?>"/>
													</div>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Leser Number <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
													<label class="radio-inline">
															<input type="text"  class="form-control" id="lesorNo" name="lesorNo" value="<?php echo $val->leaser_no;?>"  />
															
														</label>
														
														
													</div>
													
												</div>
												</div>
									</div>
									<div class="form-group">
									<div class="row">
									<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Father Name  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control"  id="fatherName" name="fatherName" value="<?php echo $val->father_name;?>" required="required" >
													</div>
												</div>
												
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Subject1 <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
													<label class="radio-inline">
															<input type="text"  class="form-control" id="sub1" name="sub1" value="<?php echo $val->subject1;?>"  />
															
														</label>
														
														
													</div>
													
												</div>
													<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Subject2  <span class="symbol "></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control"  id="sub2" name="sub2" value="<?php echo $val->subject2;?>"  >
													</div>
													
													
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Subject3 <span class="symbol "></span>
													</label>
													<div class="col-sm-7">
													<label class="radio-inline">
															<input type="text"  class="form-control" id="sub3" name="sub3" value="<?php echo $val->subject3;?>"  />
															
														</label>
														
														
													</div>
													
												</div>
												</div>
									</div>
								
									<div class="form-group">
									<div class="row">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														 Fee <span class="symbol required">
													<br><br>
													<br>
													Adhar No <span class="symbol required"></span>
													<br><br>
													<br>
												Date Of Admission<span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text"  class="form-control" id="fee" name="addfee" value="<?php echo $val->fee;?>"  ><br>
														<input type="text"  class="form-control" name="adhaarNo" value="<?php echo $val->adhaarNo;?>"><br>
														<input type="text"  class="form-control" name="addmissionDate" value="<?php echo $val->addmissionDate;?>">
														<input type="hidden" name ="student_id" value="<?php echo $val->roll_number;?>"/>
													</div>
												</div>
												
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														 <span class="symbol required">Photo</span>
													</label>
													<div class="col-sm-7">
												<img src="<?php echo base_url();?>/assets/images/stuImage/<?php echo $val->student_image;?>" width="150" height="100">		
														<input type="text" class="form-control"  id="stuImage" name="stuImage" value="<?php echo $val->student_image;?>"  >
<input type="file" class="form-control"  id="update_student_image" name="stuImage"  >
													
													</div>
												</div>
											</div>
									</div>
									
									
									
									<br>
								
	                  <div class="col-md-4">
	                    			<input type="submit" value="Save & Print Reciept" class="btn btn-success">
	                    	</div>
	              </div>
	                    	
	              </div>
	             </form>
	              <?php }?>
	               
	       </div>
	    </div>
	  </div>
	          
			