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
								    <?php foreach($courses as $value): ?>
								    <option value='<?= $value->id ?>'><?= $value->title ?></option>
								    <?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="row">
					    <div class="col-md-12">
					        <table class="table">
					            <thead>
					                <tr id="head"></tr>
					            </thead>
					            <tbody id="dataFee">
					                
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
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>configure/getFeeDetails",
            data: {"courseID": id},
            success: (data) => {
                let response = JSON.parse(data);
                
                let headFirst = `<th>#</th><th>Fee Head</th>`
                let head = response.category.map(val => {
                    return `<th>${val.title}</th>`
                }).join('')
                $("#head").html(headFirst + head)
                
                let finalData = new Array()
                
                
                response.feeHead.map(feeVal => {
                    let dataJSON = {
                        "feeHead": feeVal.title,
                        "feeHeadID": feeVal.id
                    }
                    let categoryData = new Array()
                    response.category.map(val => {
                        response.result.map(resVal => {
                            if(val.id == resVal.categoryID && feeVal.id == resVal.feeHeadID){
                                let feeData = {"category": val.title, "categoryID": val.id, "feeAmount": resVal.amount, "feeAmountID": resVal.id}
                                categoryData.push(feeData)
                            }
                        })
                    })
                    dataJSON = Object.assign(dataJSON, {"feeData": categoryData});
                    finalData.push(dataJSON)
                })
                
                console.log(finalData)
                
                let rows = finalData.map((val, idx) => {
                    let rowsSub = val.feeData.map((value, udx) => {
                        return `<td>
                            <input type="text" readonly value="${value.feeAmount}" id="fee${idx}${udx}" />
                            <input type="hidden" value="${value.feeAmountID}" id="feeID${idx}${udx}" />
                        </td>`
                    }).join("")
                    
                    let rowsIDs = val.feeData.map((value, udx) => {
                        return `'fee${idx}${udx}','feeID${idx}${udx}'`
                    }).join(",")
                    return `<tr>
                                <td>${idx + 1}</td>
                                <td>${val.feeHead}</td>
                                ${rowsSub}
                                <td><button id="edit${idx}" onclick="editFee(${rowsIDs},'edit${idx}')">Edit</button>
                            </tr>`
                }).join('');
                
                $("#dataFee").html(rows)
            }
        })
    }
    
    function editFee(id1, feeID1, id2, feeID2, id3, feeID3, buttonID) {
        if($(`#${buttonID}`).html() == 'Edit') {
            $(`#${id1}`).removeAttr("readonly");
            $(`#${id2}`).removeAttr("readonly");
            $(`#${id3}`).removeAttr("readonly");
            
            $(`#${buttonID}`).html('Save')
        }
        else {
            let updateData = {
                "feeAmount1": $(`#${id1}`).val(),
                "feeID1": $(`#${feeID1}`).val(),
                "feeAmount2": $(`#${id2}`).val(),
                "feeID2": $(`#${feeID2}`).val(),
                "feeAmount3": $(`#${id3}`).val(),
                "feeID3": $(`#${feeID3}`).val()
            }
            $.ajax({
                method: "post",
                url: "<?= base_url() ?>configure/updateFeeDetails",
                data: updateData,
                success: (data) => {
                    
                    alert(data)
                    $(`#${id1}`).attr("readonly", "true");
                    $(`#${id2}`).attr("readonly", "true");
                    $(`#${id3}`).attr("readonly", "true");
                    
                    $(`#${buttonID}`).html('Edit')
                }
            })
        }
    }
</script>