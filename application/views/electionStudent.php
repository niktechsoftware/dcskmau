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
									     <th style="width:5%;">Ledger No</th>
							          	<th style="width:5%;">Roll No</th>
										<th style="width:20%;">Name</th>
										<th style="width:20%;">Father Name</th>
										<th style="width:10%;">Course</th>	
									    <th style="width:10%;">Sub</th>
										<th>Photo</th>			
										<th >Signature</th>
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
            url: "<?= base_url() ?>student/getElectionYears",
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
            url: "<?= base_url() ?>student/getSearchWithPhoto",
            data: {"course": course, "year": year},
            success: (data) => {
                document.getElementById("students").setAttribute("style","display: initial;");
                let response = JSON.parse(data);
                
                let optionString = response.result.map(val => { 
                    
                    let button = val.year == '1st' ? ` <img src="<?php echo base_url();?>/assets/images/2018studentImages/${val.image}" width="70" height="60">` : `<img src="<?php echo base_url();?>/assets/images/stuImage/${val.image}" width="70" height="60">`
                  let button1 = val.course == 'MA' ? `${val.sub1}` : ` `
                    return `<tr id="tr_button_${val.sno}">
                               <td>${val.leaser_no}</td>
                                <td>${val.roll_no}</td>
                                <td>${val.name}</td>
                                <td>${val.father_name}</td>
                                <td>${val.course}  ${val.year}</td>
                                <td>${button1}</td>
                                <td>${button}</td>
                                <td>
                                  
                                </td>
                            </tr>`
                }).join('')
                $("#tableBody").html(optionString)
            }
        })
    }
    
</script>
									

