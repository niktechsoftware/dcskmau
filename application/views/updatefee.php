				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Student Profile</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/css/invoice_css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/invoice_js/example.js'></script>

	<style type="text/css">
		table tr th{
			text-align: left;
			border: none;
			font-size: 14px;
			line-height: 30px;
		}
		table tr td{
			border: none;
			background-color: white;
			font-size: 14px;
			line-height: 30px;
		}
	</style>
	
</head>

<body>
<div id="printcontent">
	<div id="page-wrap" style="background-color: white;">
<?php
 
	$id = $this->uri->segment(3);
	$addfee = $this->uri->segment(4);
	
	$this->db->where("roll_number",$id);
	$detail = $this->db->get("student_info")->row();
	
?>	
		<table style="width: 100%">
			<tr>
				<td width="10%" style="border: none;">
					<img src="<?php echo base_url()?>assets/images/invoice_logo.jpg" alt="" width="100" />
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
				<td><?php echo $detail->leaser_no; ?></td>
				<th style="background-color: white;">Photo</th>
				<td>
				<div style="width: 115px; height: 120px; border: 1px solid #ccc;">
											<?php if(strlen($detail->student_image > 0)):?>
												<img alt="<?php echo $detail->name;?>" height="115" width="110" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $detail->student_image;?>" />
											<?php else:?>
												<?php if($detail->gender == 'MALE'):?>
													<img alt="<?php echo $detail->name;?>" height="115" width="110" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
												<?php endif;?>
												<?php if($detail->gender == 'FEMALE'):?>
													<img alt="<?php echo $detail->name;?>" height="115" width="110" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
												<?php endif;?>
											<?php endif;?>
										</div>
				</td>
			</tr>		
		  		<tr>
				<th style="background-color: white;">Student Roll Number</th>
				<td><?php echo $detail->roll_number; ?></td>
				<th style="background-color: white;">Student Name</th>
				<td><?php echo $detail->name; ?></td>
			</tr>
			
			<tr>
				<th style="background-color: white;">Father Name</th>
				<td><?php echo $detail->father_name; ?></td>
				<th style="background-color: white;">Mother Name</th>
				<td><?php echo $detail->mother_name; ?></td>
			</tr>
			<tr>
				<th style="background-color: white;">Gender</th>
				<td><?php echo $detail->gender; ?></td>
				<th style="background-color: white;">Category</th>
				<td><?php echo $detail->category; ?></td>
			</tr>
			
			<tr>
				<th style="background-color: white;">Mobile Number</th>
				<td><?php echo $detail->mobile_number; ?></td>
				<th style="background-color: white;">Address</th>
				<td><?php echo $detail->address; ?></td>
			</tr>
			<tr>
				<th style="background-color: white;">Course</th>
				<td><?php echo $detail->course; ?></td>
				<th style="background-color: white;">Year</th>
				<td><?php echo $detail->year; ?></td>
			</tr>
			<tr>
				<th style="background-color: white;">Subject 1</th>
				<td><?php echo $detail->subject1; ?></td>
				<th style="background-color: white;">Subject 2</th>
				<td><?php echo $detail->subject2; ?></td>
			</tr>
			<tr>
				<th style="background-color: white;">Subject 3</th>
				<td><?php echo $detail->subject3; ?></td>
				<th style="background-color: white;">Privious Subject Fee</th>
				<td><?php echo (($detail->fee)-$addfee); ?></td>
			</tr>
		<tr>
				<th style="background-color: white;">Add Fee</th>
				<td><?php echo $addfee; ?></td>
				<th style="background-color: white;">Total Subject Fee</th>
				<td><?php echo $detail->fee; ?></td>
			</tr>
		
		  
        
		</table>
	<hr></hr>
			
		
        
		<div style="clear:both"></div>
		<hr></hr>
		
		
	<div class="invoice-buttons">
    	<button class="btn btn-default margin-right" type="button" onclick="window.print();" >
        	<i class="fa fa-print padding-right-sm"></i> Print Invoice
        </button>
    </div>
	</div>
</div>	
</body>

</html>

              