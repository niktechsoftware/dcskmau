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
									    <option vlaue="">-Select course-</option>
									    <?php foreach($course as $val): ?>
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
									<select name="class" id="year" onchange="getsub('className','year')"></select>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">
										Subject <span class="symbol required"></span>
									</label>
									<select name="class" id="subj" onchange="getStudents()"></select>
								</div>
							</div>
						</div>
	                </div>
                </form>
					<div class="table-default" id="students" style="display:none;">
						<table class="table table-striped table-hover" id="sample-table-1">
							<thead>
								<tr>
								     <th style="width:5%;">sno</th>
									     <th style="width:5%;">Ledger No</th>
							          	<th style="width:5%;">Roll No</th>
										<th style="width:20%;">Name</th>
										<th style="width:20%;">Father Name</th>
										<th style="width:10%;">Course</th>	
									   			<th style="width:10%;">Gender</th>	
									   			<th style="width:10%;">Mobile</th>
										<th >Category</th>
										<th >Subject 1</th>
										<th >Subject 2</th>
										<th >subject 3</th>
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
    
    function getsub(courseID, yearID) {
         let course = document.getElementById(courseID).value
        let year = document.getElementById(yearID).value
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>student/getsubj",
            data: {"course": course, "year": year},
            success: (data) => {
                let response = JSON.parse(data);
                let optionString = "<option value=''>-Select Subject-</option><option value='as'>-All Subject-</option>"
                
                optionString += response.response.map(val => { return ` <option value='${val.subject_name}'>${val.subject_name}</option>` }).join('')
                $("#subj").html(optionString)
            }
        })
    }
    
    function getStudents() {
        let course = document.getElementById("className").value
        let year = document.getElementById("year").value
        let subject = document.getElementById("subj").value
        let j=0;
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>student/getElectionStudents",
            data: {"course": course, "year": year, "subject": subject},
            success: (data) => {
                document.getElementById("students").setAttribute("style","display: initial;");
                let response = JSON.parse(data);
                
                let optionString = response.result.map(val => { 
                    
                    //let button = val.year == '1st' ? ` <img src="<?php echo base_url();?>/assets/images/2018studentImages/${val.image}" width="70" height="60">` : `<img src="<?php echo base_url();?>/assets/images/stuImage/${val.image}" width="70" height="60">`
                  j=j+1;
                    return `<tr>
                                <td>${j}</td>
                               <td>${val.leaser_no}</td>
                                <td>${val.roll_number}</td>
                                <td>${val.name}</td>
                                <td>${val.father_name}</td>
                                <td>${val.course}  ${val.year}</td>
                                <td>${val.gender} </td>
                                <td>${val.mobile_number} </td>
                                <td>${val.category}</td>
                                <td>${val.subject1}</td>
                                <td>${val.subject2}</td>
                                <td>${val.subject3}</td>
                                <td>
                                  
                                </td>
                            </tr>`
                            
                }).join('')
                $("#tableBody").html(optionString)
            }
        })
    }
    
</script>
									

