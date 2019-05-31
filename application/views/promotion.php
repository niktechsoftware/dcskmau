<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Select Class/Subject</h4>
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
			    <form action="<?php echo base_url();?>index.php/newAdmissionController/updateStudentFeeStatus"  method ="post" role="form" id="form" enctype="multipart/form-data">
				    <div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">
										Class:<span class="symbol"></span>
									</label>
									<select name="class" id="className" onchange="getYears(this.value)">
									    <option vlaue="">-Select Class-</option>
									    <?php foreach($courses as $val): ?>
									    <option vlaue="<?= $val->course; ?>"><?= $val->course; ?></option>
									    <?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">
										Year <span class="symbol required"></span>
									</label>
									<select name="class" id="year" onchange="getStudents('className')"></select>
								</div>
							</div>
						</div>
	                </div>
                </form>
					<div class="table-default" id="students" style="display:none;">
						<table class="table table-striped table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th>sno</th>
									<th>Roll Number</th>
									<th>Name</th>
									<th>Father Name</th>
									<th>mobile_number</th>
									<th>Course</th>	
									<th>Leaser</th>
									<th>Fee Status</th>
									<th>Promotion</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="tableBody"></tbody>
						</table>
					</div>
			</div>	
		</div>
	</div>
</div>
<script type="text/javascript">
    function getYears(course) {
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>student/getyear",
            data: {"course": course},
            success: (data) => {
                let response = JSON.parse(data);
                let optionString = "<option value=''>-Select Year-</option>"
                optionString += response.response.map(val => { return `<option value='${val.year}'>${val.year}</option>` }).join('')
                $("#year").html(optionString)
            }
        })
    }
    
    function getStudents(courseID) {
        let course = document.getElementById(courseID).value
        let year = document.getElementById("year").value
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>student/getstudents",
            data: {"course": course, "year": year},
            success: (data) => {
                document.getElementById("students").setAttribute("style","display: initial;");
                let response = JSON.parse(data);
                
                let optionString = response.result.map(val => { 
                    
                    let button = val.leaser_no == '' || val.leaser_no == null ? `<a href="<?= base_url() ?>student/printSlip/${val.roll_number}" class="btn btn-default">Print</a>` : `<a href="<?= base_url() ?>student/promote/${val.sno}" class="btn btn-default">Promote</a>`
                    let status=val.status;
                    return `<tr id="tr_button_${val.sno}">
                                <td>${val.sno}</td>
                                <td>${val.roll_number}</td>
                                <td>${val.name}</td>
                                <td>${val.father_name}</td>
                                <td>${val.mobile_number}</td>
                                <td>${val.course}</td>
                                <td>${val.leaser_no}</td>
                                <td>${val.fee_status}</td>
                                <td>
                                    ${button}
                                </td>
                                <td> ${status}
                              <?php  if('status'==1){echo "active";}else{echo "inactive";} ?>
                                	</td>
                            </tr>`
                }).join('')
                $("#tableBody").html(optionString)
            }
        })
    }
    
</script>
									

