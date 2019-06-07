<?php
$i = 1;
if(isset($empList)){

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
				//print_r($view);
				$a= $view->emp_user;
				$this->db->where('id',$a);
				$emp = $this->db->get('employee_info')->row();
				?>
			<tr>
				<td><?php echo $emp->username; ?></td>
				<td><?php echo $emp->first_name." ".$emp->mid_name." ".$emp->last_name;?></td>
				<td><?php echo $emp->job_title;?></td>
				<td><?php echo $emp->status;?></td>
				<?php $b = $view->course_id;
				//echo $b;
				$this->db->where('id',$b);
				$cours = $this->db->get('course')->row();?>
				<td><input type="text" name="course" id="coursevalue<?php echo $i;?>" value="<?php echo $cours->title;?>">
					<input type="hidden" id="empId<?php echo $i;?>" size="13" value="<?php echo $view->id;?>">
				</td>
				<td>
				 <a href="" class="btn btn-sm btn-primary" id="edit<?php echo $i;?>"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<td>
					<a href="" class="btn btn-sm btn-primary" id="delete<?php echo $i;?>"><i class="fa fa-trash-o"></i> Delete</a>
				</td>
			</tr>
		<?php $i++; } ?>
		</table> 
	</div>
</div>
<?php }?>
<script>
	    <?php for($j = 1; $j < $i; $j++){ ?>
			    $("#edit<?php echo $j; ?>").click(function(){
		    		var empId = $('#empId<?php echo $j; ?>').val();
		    		var empuname = $('#coursevalue<?php echo $j;?>').val();
		    		alert("your course is successfully updated");
		    		var form_data = {
		    			empId : empId,
							empuname : empuname
						};
				$.ajax({
					url: "<?php echo site_url("configure/updateCourse") ?>",
					type: 'POST',
					data: form_data,
					success: function(data){
						$("#classEmp").html(data);
					}
				});
		        });
			    $("#delete<?php echo $j; ?>").click(function(){
		    		var empId = $('#empId<?php echo $j; ?>').val();
		    		$.post("<?php echo site_url('configure/deleteCourse') ?>", {empId : empId}, function(data){
		                $("#classEmp").html(data);
		    		})
		        });
	                
                    <?php } ?>   
</script>