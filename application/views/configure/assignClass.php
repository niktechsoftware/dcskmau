<?php
	//print_r($empList);
$i = 1;
if(isset($empList)):
//$empList;
?>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered" id="empshowList">
			<tr>
				<th>Employee Username</th>
				<th>Employee Name</th>
				<th>Job</th>
				<th>Status</th>
				<th>Course</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php foreach($empList->result() as $view){
				$a= $view->emp_user;
				$this->db->where('username',$a);
				$emp = $this->db->get('employee_info')->row();
				?>
			<tr>
				<td><?php echo $emp->username;?></td>
				<td><?php echo $emp->first_name." ".$emp->mid_name." ".$emp->last_name;?></td>
				<td><?php echo $emp->job_title;?></td>
				<td><?php echo $emp->status;?></td>
				<td><input type="text" name="course" id="coursevalue<?php echo $i;?>" value="<?php echo $view->course_id;?>">
					<input type="hidden" id="courseId<?php echo $i;?>" size="13" value="<?php echo $emp->username; ?>">
				</td>
				<td>
				 <a href="" class="btn btn-sm btn-primary" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<td>
					<a href="" class="btn btn-sm btn-primary" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
				</td>
			</tr>
		<?php $i++;}?>
		</table> 
	</div>
</div>
<script type="text/javascript">
	<?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var empuname = $('#courseid<?php echo $j; ?>').val();
		    		var courseId = $('#coursevalue<?php echo $j;?>').val();
		    		alert(courseId);
		    		alert(empuname);
		    		alert("your course is successfully updated");
		    		var form_data = {
							coursenm : coursenm,
						};
				$.ajax({
					url: "<?php echo site_url("configure/updateExam") ?>",
					type: 'POST',
					data: form_data,
					success: function(msg){
						$("#classEmp").html(msg);
					}
				});
		        });
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var examId = $('#examId<?php echo $j; ?>').val();	
		    		//alert(streamName);
		    		$.post("<?php echo site_url('examconfiguration/deleteExam') ?>", {examId : examId}, function(data){
		                $("#examAdd1").html(data);
		                //alert(data);
		    		})
		        });
               <?php }?>    
</script>