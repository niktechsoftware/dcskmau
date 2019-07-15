<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Student Detail to Promote</h4>
				<div class="panel-tools">										
        			<div class="dropdown">
        				<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey"><i class="fa fa-cog"></i></a>
        				<ul class="dropdown-menu dropdown-light pull-right" role="menu">
        					<li><a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a></li>
        					<li><a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a></li>
        					<li><a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a></li>										
        				</ul>
        			</div>
				</div>
		    </div>
			<div class="panel-body">
			    <form action="<?php echo base_url();?>student/finalpromote/<?php echo $stuInfo->sno;?> "  method ="post" role="form" id="form" enctype="multipart/form-data">
				    <div class="col-md-12">
						<div class="form-group">
						    <div class="row">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Student Name  <span class="symbol"></span>
									</label>
									<div class="col-sm-7">
										<input type="text"  class="form-control" readonly="true" id="patientName" name="patientName" value="<?= $stuInfo->name; ?>" required="required" >
										
										<input type="hidden" name ="student_id" value="<?= $stuInfo->roll_number; ?>"/>
									</div>
								</div>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Leser Number <span class="symbol"></span>
									</label>
									<div class="col-sm-7">
											<input type="text"  class="form-control" readonly="true" id="lesorNo" name="lesorNo" value="<?= $stuInfo->leaser_no; ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
						    <div class="row">
						        <div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Father Name  <span class="symbol"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" readonly="true" id="fatherName" name="fatherName" value="<?= $stuInfo->father_name; ?>" />
									</div>
								</div>
								
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Admission Date <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<input type="date"  class="form-control" name="admissionDate" readonly="true" value="<?= $stuInfo->date; ?>" required="required" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
						    <div class="row">
						        <div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Gender  <span class="symbol"></span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" readonly="true" id="gender" name="gender" value="<?= $stuInfo->gender; ?>" />
									</div>
								</div>
								
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Category </span>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" readonly="true" id="category" name="category" value="<?= $stuInfo->category; ?>" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Date Of Birth <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
									    <input type="text" class="form-control" readonly="true" id="dob" name="dob" value="<?= $stuInfo->dob; ?>" />
									<!--	<input type="date"  class="form-control" name="dob" required="required" />-->
									</div>
								</div>
								
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Adhaar No <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
									    <input type="text" class="form-control" readonly="true" id="adhaar" name="adhaar" value="<?= $stuInfo->adhaarNo; ?>" />
									<!--	<input type="text"  class="form-control" name="adhaar" required="required" />-->
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">	
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Subject1 <span class="symbol"></span>
									</label>
									<div class="col-sm-1">
									    <?php if($stuInfo->year == '2nd'): ?>
									        <input type="radio" name="skip" value="<?= $stuInfo->subject1; ?>">
									    <?php endif; ?>
									</div>
									<div class="col-sm-6">
										<input type="text" readonly="true" class="form-control" id="sub1" name="sub1" value="<?= $stuInfo->subject1; ?>" />
									</div>
								</div>
								<?php if(!($stuInfo->course == 'MA (G OTHER)' || $stuInfo->course == 'MA' || $stuInfo->course == 'MA (G)' || $stuInfo->course == 'MA (OTHER)')): ?>
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Subject2  <span class="symbol"></span>
									</label>
									<div class="col-sm-1">
									    <?php if($stuInfo->year == '2nd'): ?>
									        <input type="radio" name="skip" value="<?= $stuInfo->subject2; ?>">
									    <?php endif; ?>
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control"  readonly="true" id="sub2" name="sub2" value="<?= $stuInfo->subject2; ?>" />
									</div>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
							    <?php if(!($stuInfo->course == 'MA (G OTHER)' || $stuInfo->course == 'MA' || $stuInfo->course == 'MA (G)' || $stuInfo->course == 'MA (OTHER)')): ?>	
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Subject3 <span class="symbol"></span>
									</label>
									<div class="col-sm-1">
									    <?php if($stuInfo->year == '2nd'): ?>
									        <input type="radio" name="skip" value="<?= $stuInfo->subject3; ?>">
									    <?php endif; ?>
									</div>
									<div class="col-sm-6">
										<input type="text"  class="form-control" readonly="true" id="sub3" name="sub3" value="<?= $stuInfo->subject3; ?>" />
									</div>
								</div>
								<?php endif; ?>	<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										University Roll No </span>
									</label>
									<div class="col-sm-7">
										<input type="text"  class="form-control" name="uRollNo" required="required" value="<?= $stuInfo->uRollNo; ?>"/>
									</div>
								</div>
							</div>
						</div>
						
							</div>
						
							
						</div>
						
						
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
										Total Fee <span class="symbol required"></span>
									</label>
									<div class="col-sm-7">
										<?php 
										
										    $practicalOrPrivate = 0;
										    foreach($result as $amt):
										        $practicalOrPrivate += $amt->fee_amount;
										    endforeach;
    										$total = 0;
    										
										    if($stuInfo->course == 'MA' || $stuInfo->course == 'MA (OTHER)' || $stuInfo->course == 'MA (G)' || $stuInfo->course == 'MA (G OTHER)'):
    										    
    										    if($practicalOrPrivate == 0):
        										    foreach($courseFee as $amt):
        										        $total += $amt->amount;
        										    endforeach;
        										else:
        										    $total = $practicalOrPrivate;
        										endif;
    										//    echo $total;
    										//    echo '<br/>'.$practicalOrPrivate;
    										    
    										else:
    										    foreach($courseFee as $amt):
    										        $total += $amt->amount;
    										    endforeach;
    										    $total = $total + $practicalOrPrivate;
    										endif;
    										
										?>
										<input type="text"  class="form-control" id="fee" name="addfee" value="<?= $total; ?>" />
										<input type="hidden" name ="student_id" value="<?= $stuInfo->roll_number; ?>"/>
									</div>
								</div>
								
								<div class="col-sm-5">
									<label class="col-sm-5 control-label">
									    <span class="symbol required">Photo</span>
									</label>
									<div class="col-sm-7">
									    <!-- <img src="<?= base_url(); ?>assets/images/stuImage/<?= $stuInfo->student_image; ?>" width="150" height="100" />	 -->
										<img src="<?= base_url(); ?>assets/images/2018studentImages/<?= $stuInfo->student_image; ?>" width="150" height="100" />
									    <?php if($stuInfo->student_image == "" || $stuInfo->student_image == null): ?>
										<input type="hidden" class="form-control" required="required" id="stuImage" name="stuImage" value="<?= $stuInfo->student_image; ?>" />
										<input type="file" class="form-control" id="update_student_image" name="stuImage" />
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-5">
								    <input type="submit" class="btn btn-success" value="Save Detail" />
								</div>
							</div>
						</div>
                </form>
			</div>	
		</div>
	</div>
</div>