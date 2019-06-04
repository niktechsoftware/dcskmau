<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: INLINE TABS PANEL -->
        <div class="panel panel-white">
            <div class="panel-heading panel-green border-light">
                <h4 class="panel-title">New Fees Entry</h4>
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
                    <form action="<?= base_url() ?>configure/saveFeeAmount" method="post">
                        <div class="col-md-6">
                            <?php $var = $this->db->query("select  title from course ");?>
                            <select id="courseID" class="form-control">
                               <?php  if($var->num_rows() > 0){
                                 echo '<option value="">-Select Course Name-</option>';
                                 foreach ($var->result() as $row){
                                 echo '<option value="'.$row->id.'">'.$row->title.'</option>';
                                 }}?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <?php $var = $this->db->query("select  username from employee_info ");?>
                            <select id="empID" class="form-control">
                               <?php  if($var->num_rows() > 0){
                                 echo '<option value="">-Select Employee Name-</option>';
                                 foreach ($var->result() as $row){
                                 echo '<option value="'.$row->id.'">'.$row->username.'</option>';
                                 }}?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    function getCategory(courseID) {
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>configure/getCategory",
            data: {"courseID": courseID},
            success: (data) => {
                let response = JSON.parse(data)
                let options = `<option>-Select Category-</option>`
                options += response.category.map(val => {
                   return `<option value="${val.id}">${val.title}</option>`
                }).join("")
                
                $("#cat").html(options)
            }
        })
    }
    
    function getFeeHeads() {
        let courseID = $("#course").val()
        let categoryID = $("#cat").val()
        $.ajax({
            method: "post",
            url: "<?= base_url() ?>configure/getFeeHeads",
            data: {"courseID": courseID, "categoryID": categoryID},
            success: (data) => {
                let response = JSON.parse(data)
                let finalData = new Array()
                response.feeHead.map(val => {
                    
                    let arr = response.feeCatHead.filter(value => {
                        return val.id == value.feeHeadID
                    })
                    if(arr.length <= 0)
                        finalData.push(val)
                })
                
                
                let options = ``
                options += finalData.map(val => {
                   return `<div class='row'>
                                <div class="form-group col-md-6">
                                    <span>${val.title} : </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="id[]" value="${val.id}" />
                                    <input type="number" name="amount[]" />
                                </div>
                            </div><option value=""></option>`
                }).join("")
                
                options += `<div class="form-group">
                                <input type="submit" id="btnSV" style="display:none;" value="Save Fee" class="btn btn-success" />
                            </div>`
                
                $("#amount").html(options)
                $("#btnSV").css("display", "")
            }
        })
    }
    
    function showAmountBox() {
        $("#btnSV").css("display", "")
        $("#amount").css("display", "")
    }
</script>