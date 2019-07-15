<div class="container">
	<form action="<?php echo base_url(); ?>index.php/newAdmissionControllers/addinfo" method="post" id="form">
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-yellow">
					<h4 class="panel-title">Student  <span class="text-bold">Information</span></h4>
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
					</div>
				</div> <!-- End Heading panel -->
				<div class="panel-body">
				<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
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
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Scholar Number <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('scholerNumber'); ?>" class="form-control" id="scholerNumber" name="scholerNumber">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											First Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('firstName'); ?>" class="form-control" id="firstName" name="firstName" required ="required">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Middle Name <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('middleName'); ?>" class="form-control" id="middleName" name="middleName">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Last Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('lastName'); ?>" class="form-control" id="lastName" name="lastName">
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Date Of Birth <span class="symbol required">(yyyy-mm-dd)</span>
										</label>
										<input type="date" value="<?php echo set_value('dob'); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dob" id="dob" class="form-control date-picker" required ="required">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Gender  <span class="symbol required" required ="required"></span>
										</label>
										<div>
											<label class="radio-inline">
												<input type="radio" class="grey" value="Female" name="gender" id="gender_female" >
												Female
											</label>
											<label class="radio-inline">
												<input type="radio" class="grey" value="Male" name="gender"  id="gender_male">
												Male
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Blood Group <span class="symbol"></span>
										</label>
										<select class="form-control" name="bloodgp" id="blood" >
		                                      <option value="N/A"></option>
		                                      <option value="A+">A+</option>
		                                      <option value="A-">A-</option>
		                                      <option value="B+">B+</option>
		                                      <option value="B-">B-</option>
		                                      <option value="O+">O+</option>
		                                      <option value="O-">O-</option>
		                                      <option value="AB+">AB+</option>
		                                      <option value="AB-">AB-</option>
	                                	</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Birth Place <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('birthPlace'); ?>" class="form-control" id="birthPlace" name="birthPlace">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Mother Tongue <span class="symbol"></span>
										</label>
										<select class="form-control" id="mothertongue" name="mothertongue" required ="required">
											<option value="N/A"></option>
											<option value="HINDI">HINDI</option>
											<option value="ENGLISH">ENGLISH</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Category <span class="symbol"></span>
										</label>
										<select class="form-control" id="category" name="category" required ="required">
											<option value="N/A"></option>
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
											Religion <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('religion'); ?>" class="form-control" id="religion" name="religion" required ="required"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Address Line 1 <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('addLine1'); ?>" class="form-control" id="addLine1" name="addLine1" required ="required"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Address Line 2 <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('addLine2'); ?>" class="form-control" id="addLine2" name="addLine2" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											City <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('city'); ?>" class="form-control" id="city" name="city" required ="required"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											State <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('state'); ?>" class="form-control" id="state" name="state" required ="required">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Pin Code <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('pinCode'); ?>" class="form-control" id="pinCode" name="pinCode">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Country <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('country'); ?>" value="India" class="form-control" id="country" name="country">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Phone Number <span class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('phonenumbar'); ?>" value="N/A" class="form-control" id="phonenumbar" name="phonenumbar">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Mobile Number <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('mobileNumber'); ?>" class="form-control" id="mobileNumber" name="mobileNumber">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											E-mail Address <span class="symbol"></span>
										</label>
										<input type="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email" name="emailAddress">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-yellow">
					<h4 class="panel-title">Parents  <span class="text-bold">Information</span></h4>
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
					</div>
				</div> <!-- End Heading panel -->
				<div class="panel-body">
				<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
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
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Father Name <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('fatherName'); ?>" class="form-control" id="fatherName" name="fatherName" required ="required"/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Mother Name <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('motherName'); ?>" class="form-control" id="motherName" name="motherName" required ="required"/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Caretaker Name <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('guardianName'); ?>" class="form-control" id="guardianName" name="guardianName" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Caretaker Relation <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('guardianRelation'); ?>" class="form-control" id="guardianRelation" name="guardianRelation" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Father's Education <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('fatherEducation'); ?>" class="form-control" id="fatherEducation" name="fatherEducation" required ="required"/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Mother's Education <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('motherEducation'); ?>" class="form-control" id="motherEducation" name="motherEducation" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Father's Occupation <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('fatherOccupation'); ?>" class="form-control" id="fatherOccupation" name="fatherOccupation" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Mother's Occupation <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('motherOccupation'); ?>" class="form-control" id="motherOccupation" name="motherOccupation" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Family Annual Income  <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('familyAnnualIncome'); ?>" class="form-control" id="familyAnnualIncome" name="familyAnnualIncome" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Address <span class="symbol required"></span>
												<input type="checkbox" id="sameAddress" /> if same as student.
											</label>
											<input type="text" value="<?php echo set_value('parentAddress'); ?>" class="form-control" id="parentAddress" name="parentAddress" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												city  <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('parentCity'); ?>" class="form-control" id="parentCity" name="parentCity" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												State <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('parentState'); ?>" class="form-control" id="parentState" name="parentState" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Pin  <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('parentPin'); ?>" class="form-control" id="parentPin" name="parentPin" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Country  <span class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('parentCountry'); ?>" class="form-control" id="parentCountry" name="parentCountry" required ="required"/>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Phone Number  <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('parentPhoneNumber'); ?>" class="form-control" id="parentPhoneNumber" name="parentPhoneNumber" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Father's Mobile Number <span class="symbol required"></span>
												<input type="checkbox" id="sameMobile" /> if same.
											</label>
											<input type="text" value="<?php echo set_value('fatherMobileNumber'); ?>" class="form-control" id="fatherMobileNumber" name="fatherMobileNumber" required ="required"/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Mother's Mobile Number <span class="symbol"></span>
											</label>
											<input type="text" value="<?php echo set_value('motherMobileNumber'); ?>" class="form-control" id="motherMobileNumber" name="motherMobileNumber" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Select Transport Services  <span class="symbol"></span>
											</label>
											
										<select class="form-control"  name="ts" id="ts" required ="required">
											<option value="N/A">SELECT</option>
											<option value="yes">YES</option>
											<option value="no">NO</option>
										</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Password <span class="symbol required"></span>
											</label>
											<input type="password" value="<?php echo set_value('password'); ?>" class="form-control" id="password" name="password" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Confirm Password <span class="symbol required"></span>
											</label>
											<input type="password" value="<?php echo set_value('password_again'); ?>" class="form-control" id="password_again" name="password_again" />
										</div>
									</div>
								</div>
								
								<div class="row" id ="jsdiv">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Vehicle Type <span class="symbol"></span>
											</label>
											<select class="form-control"  name="vt" id="vt" >
											<option value="N/A">SELECT VEHICLE</option>
											<?php 
											$this->db->distinct();
											$this->db->select("vehicle_name");
											$this->db->where("school_code",$this->session->userdata("school_code"));
											$rts = $this->db->get("transport");
											if($rts->num_rows()>0){
											foreach($rts->result() as $row):?>
												
											<option value="<?php echo $row->vehicle_name;?>"><?php echo $row->vehicle_name;?></option>
											
										
										
										<?php endforeach; }?></select></div>
									</div>
								<!--  	<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Vehicle Number or Person name  <span class="symbol"></span>
											</label>
											
										<input type="text"  class="form-control" id="vnumnber" name="vnumnber"  />
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Distance from School <span class="symbol required"></span>
											</label>
											<input type="text"  class="form-control" id="distance" name="distance"  />
										</div>
									</div>
									-->
								</div>
							</div>
						</div>
						
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-yellow">
					<h4 class="panel-title">School  <span class="text-bold">Information</span></h4>
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
					</div>
				</div> <!-- End Heading panel -->
				<div class="panel-body">
				<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
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
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												 Admission Date<span class="symbol required">(yyyy-mm-dd)</span>
											</label>
											<input type="date" value="<?php echo set_value('dateOfAdmission'); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dateOfAdmission" id="doa" class="form-control date-picker">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Class Of Admission <span class="symbol required"></span>
											</label>
											<select class="form-control" id="classOfAdmission" name="classOfAdmission" required ="required">
												<option value=""></option>
												<?php if(isset($className)):?>
													<?php foreach ($className as $row):?>
												<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Section <span class="symbol required"></span>
											</label>
											<select class="form-control" id="section" name="section">
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Stream <span class="symbol required"></span>
											</label>
											<select class="form-control" id="stream" name="stream" required ="required">
												<option> Select Stream</option>
												<?php
												$sub = $this->db->query("SELECT DISTINCT stream FROM subject")->result();
												foreach($sub as $row):
												echo '<option value="'.$row->stream.'">'.$row->stream.'</option>';
												endforeach;
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row" id="sub1234"></div>
								<br/>
								<h4 class="panel-title panel-yellow">Previous School/class Detail....</h4>
								<div class="row">
									<div class="col-md-12">
										<table class="table">
											<thead>
												<th>Class</th>
												<th>School Name</th>
												<th>Passing Year</th>
												<th>Roll No.</th>
												<th>Marks</th>
												<th>Percentages</th>
												<th>Subject</th>
											</thead>
											<tbody>
												<td><input type="text" class="form-control" id="pClass" name="pClass" /></td>
												<td><input type="text" class="form-control" id="pSchool" name="pSchool" /></td>
												<td><input type="text" class="form-control" id="pYear" name="pYear" /></td>
												<td><input type="text" class="form-control" id="pRoll" name="pRoll" /></td>
												<td><input type="text" class="form-control" id="pMarks" name="pMarks" /></td>
												<td><input type="text" class="form-control" id="pPercentage" name="pPercentage" /></td>
												<td><input type="text" class="form-control" id="pSubject" name="pSubject" /></td>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
	<!-- --------------------------------------------------------------------------------------------------------------------- -->
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div>
									<span class="symbol required"></span>Required Fields
									<hr>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<p>
									By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
								</p>
							</div>
							<div class="col-md-4">
								<input type="submit" value="Register" class="btn btn-yellow btn-block"/>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	</form>
</div>