<!-- start: PAGE CONTENT -->
<div class="row">
   <style>
    table tr th{
    padding-top: 2%;
    font-size: 16px;
    font-weight: bold; 
    }
     table tr td{
    padding-top: 2%;
    font-weight: bold; 
    }
</style>
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Print Slip</h4>
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
			    <div id="printcontent">
			        <?php
 
	$id = $this->uri->segment(3);
	$this->db->where("roll_number",$id);
	$stuInfo = $this->db->get("student_info")->row();
	
?>	
                	<div id="page-wrap" style="background-color: white;">
                	
                		<table style="width: 100%">
                			<tr>
                				<td width="10%" style="border: none;">
                					<img src="http://dcskmau.com/dcs/assets/images/invoice_logo.jpg" alt="" width="100" />
                				</td>
                				<td style="border: none;">
                					<h1 align="center" style="text-transform:uppercase;"></h1>
                			        <h3 align="center" style="font-variant:small-caps;">
                						
                			        </h3>
                			        <h3 align="center" style="font-variant:small-caps;">
                						दुर्गादत्त चुन्नीलाल सागरमल खण्डेलवाल महाविद्यालय
                			        </h3>
                			        <h3 align="center" style="font-variant:small-caps;">
                						मऊनाथ भंजन, मऊ
                			        </h3>
                				</td>
                			</tr>
                		</table>
                		
                        
                		<div style="clear:both"></div>
                		<hr></hr>
                		
                		<table id="items" align="center" style="width:90%; margin-top:30px; alignment-adjust:central; margin-left:2.5%;">
                		  
                	    <h3 align="center">Student Detail</h3>
                		  		
                		  		<tr>
                				<th style="background-color: white;">Leaser No</th>
                				<td><?= $stuInfo->leaser_no; ?></td>
                				<th style="background-color: white;">Photo</th>
                				<td>
                				<div style="width: 115px; height: 120px; border: 1px solid #ccc;">
                			        <img alt="<?= $stuInfo->name; ?>" height="115" width="110" src="<?= base_url(); ?>assets/images/2018studentImages/<?= $stuInfo->student_image; ?>" />
                			    </div>
                				</td>
                			</tr>
                			
                			<tr><th style="background-color: white;">Admission Date</th>
                				<td><?= date("d-m-Y", strtotime($stuInfo->addmissionDate)); ?></td>
                				<th style="background-color: white;">DOB</th>
                				<td><?= date("d-m-Y", strtotime($stuInfo->dob)); ?></td>
                			</tr>	
                		  		<tr>
                				<th style="background-color: white;">Student Roll Number</th>
                				<td><?= $stuInfo->roll_number; ?></td>
                				<th style="background-color: white;">Student Name</th>
                				<td><?= $stuInfo->name; ?></td>
                			</tr>
                			
                			<tr>
                				<th style="background-color: white;">Father Name</th>
                				<td><?= $stuInfo->father_name; ?></td>
                				<th style="background-color: white;">Mother Name</th>
                				<td><?= $stuInfo->mother_name; ?></td>
                			</tr>
                			<tr>
                				<th style="background-color: white;">Gender</th>
                				<td><?= $stuInfo->gender; ?></td>
                				<th style="background-color: white;">Category</th>
                				<td><?= $stuInfo->category; ?></td>
                			</tr>
                			
                			<tr>
                				<th style="background-color: white;">Mobile Number</th>
                				<td><?= $stuInfo->mobile_number; ?></td>
                				<th style="background-color: white;">Address</th>
                				<td><?= $stuInfo->address; ?></td>
                			</tr>
                			<tr>
                				<th style="background-color: white;">Course</th>
                				<td><?= $stuInfo->course; ?></td>
                				<th style="background-color: white;">Year</th>
                				<td><?= $stuInfo->year; ?></td>
                			</tr>
                			<tr>
                				<th style="background-color: white;">Subject 1</th>
                				<td><?= $stuInfo->subject1; ?></td>
                				<th style="background-color: white;">Subject 2</th>
                				<td><?= $stuInfo->subject2; ?></td>
                			</tr>
                			<tr>
                				<th style="background-color: white;">Subject 3</th>
                				<td><?= $stuInfo->subject3; ?></td>
                				<th style="background-color: white;">Fee</th>
                				<td><?= $stuInfo->fee; ?></td>
                			</tr>
                			<tr>
                				<th colspan="2">
                				   
                				</th>
                				<th colspan="2">
                				    <br/>
                				    <br/>
                				    Cleark Signature
                				    <br/>
                				    ...............................
                				</th>
                			</tr>
                			
                		</table>
                		<div style="clear:both"></div>
                		<hr></hr>
                		
                			<div style="clear:both"></div>
                		<hr></hr>
                	
                	</div>
                	<div class="invoice-buttons">
                    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
                        	<i class="fa fa-print padding-right-sm"></i> Print Invoice
                        </button>
                    </div>
                </div>	

			</div>	
		</div>
	</div>
</div>