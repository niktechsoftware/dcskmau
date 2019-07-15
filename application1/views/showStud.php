<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading panel-blue border-light">
        <h4 class="panel-title">Student Record </h4>
      </div>
      <div class="panel-body">
      	<div class="row">
      		<div class="col-md-12">
      			<table class="table table-bordered table-striped" id="showstud">
      				<thead>
      					<tr>
      					<th>Sno</th>
      					<th>Roll No</th>
      					<th>Name</th>
      					<th>Mobile No</th>
      					<th>Course</th>
      					<th>Year</th>
      					<th>Gender</th>
      					<th>Category</th>
      					<th>College Code</th>
      					<th>Leaser No.</th>
      				</tr>
      				</thead>

      				<tbody>
      					<?php $i=1;
      					$stud = $this->db->get('student_info');
      					//print_r($stud);exit;
      					foreach($stud->result() as $student){
      						//print_r($student);exit;
      					?>
      					<tr>
      						<td><?php echo $i;?></td>
      						<td><?php echo $student->roll_number;?></td>
      						<td><?php echo $student->name;?></td>
      						<td><?php echo $student->mobile_number;?></td>
      						<td><?php echo $student->course;?></td>
      						<td><?php echo $student->year;?></td>
      						<td><?php echo $student->gender;?></td>
      						<td><?php echo $student->category;?></td>
      						<td><?php echo $student->scode;?></td>
      						<td><?php echo $student->leaser_no;?></td>
      					</tr>
      					<?php $i++; } ?>
      				</tbody>
      				<tfoot>
      					<tr>
      					<th>Sno</th>
      					<th>Roll No</th>
      					<th>Name</th>
      					<th>Mobile No</th>
      					<th>Course</th>
      					<th>Year</th>
      					<th>Gender</th>
      					<th>Category</th>
      					<th>College Code</th>
      					<th>Leaser No.</th>
      				</tr>
      				</tfoot>
      			</table>
      		</div>
      	</div>
      </div>
  </div>
</div>
</div>