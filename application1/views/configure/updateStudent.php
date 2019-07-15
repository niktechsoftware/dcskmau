<!-- start: PAGE CONTENT -->

<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
		    <div class="panel-heading panel-green border-light">
				<h4 class="panel-title">Set Fees</h4>
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
			    <div class="col-md-12">
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label class="control-label">Course</label>
								<select name="year" required="true" onchange="getFeeData(this.value)">
								    <option> -Select Course-</option>

								    <?php  //print_r($courses->result());
                                    foreach($courses->result() as $value):
                                        $a = $value->course_id;
                                        $this->db->where('id',$a);
                                       $co = $this->db->get('course')->result();
                                        print_r($co);
                                        foreach($co as $c) {
                                       ?>
								    <option value='<?= $c->title ?>'><?= $c->title; ?></option>
								    <?php }endforeach; ?>
								</select>
								<span id="loading"></span>
							</div>
						</div>
					</div>
					
					<div class="row">
					    <div class="col-md-12 table-responsive">
					        <table class="table" id="studentDet">
					            <thead>
					                <tr id="head"></tr>
					            </thead>
					            <tbody id="studentDetail">
					                
					            </tbody>
					        </table>
					    </div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    function getFeeData(id) {
        let course = id.split("-")[0]
        let year =id.split("-")[1]
        //alert(course);
        //alert(year);
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>configure/getStuDetails",
            data: {
                    "year" : year,
                "course": course},
            beforeSend: function () {
                $(`#loading`).html('Please Wait...')
            },
            success: (data) => {
                $(`#loading`).html('')
                //alert(data);
                let response = JSON.parse(data);
                let headFirst = `<th>#</th><th>Roll Number</th><th>Name</th><th>Aadhar No.</th><th width=80px;>Laser No </th><th>Reciept</th><th>Book No</th><th>Settings</th>`
                let head = response.feeHead.map((val, idx) => {
                    return `<tr>
                    <td>${idx}</td>
                    <td>${val.roll_number}</td>
                    <td>${val.name}</td>
                    <td><input type="text" id="aadhar${idx}" value="${val.adhaarNo}" /></td>
                    <td><input type="text" id="leaser${idx}" value="${val.leaser_no}" /></td>
                    <td ><input type="text" id="reciept${idx}" value="${val.reciept_no}" /></td>
                    <td><input type="text" id="book${idx}" value="${val.book_no}" /></td>
                    <td><button class="btn btn-success" id="btn${idx}" onclick="editData(${val.sno},'aadhar${idx}','leaser${idx}','reciept${idx}','book${idx}','btn${idx}')">Edit</button></td>
                    </tr>`
                }).join('')
                $("#head").html(headFirst)
                
                $("#studentDetail").html(head)
            }
        })
    }
    
    function editData(rowID, aadharID, leaserID, recieptID, bookID, editBtnID) {
        
        let postData = {
            "sno": rowID,
            "adhaarNo": $(`#${aadharID}`).val(),
            "leaser_no": $(`#${leaserID}`).val(),
            "reciept_no": $(`#${recieptID}`).val(),
            "book_no": $(`#${bookID}`).val()
        }
        $.ajax({
            method: 'post',
            url: "<?= base_url() ?>configure/setStuDetails",
            data: postData,
            beforeSend: function () {
                $(`#${editBtnID}`).html("Wait..")
            },
            success: (data) => {
                $(`#${editBtnID}`).html("Edit")
            }
        })
    }
    
    
</script>