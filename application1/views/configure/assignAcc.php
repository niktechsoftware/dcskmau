<!-- start: PAGE CONTENT -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
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
                <div class="row">
                        <div class="col-md-5">
                            <?php $var = $this->db->query("select * from course ");?>
                            <select id="courseID" class="form-control">
                               <?php  if($var->num_rows() > 0){
                                 echo '<option value="">-Select Course Name-</option>';
                                 foreach ($var->result() as $row){
                                 echo '<option value="'.$row->id.'">'.$row->title.'</option>';
                                 }}?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <?php $var = $this->db->query("select  * from employee_info ");?>
                            <select id="empID" class="form-control" >
                               <?php  if($var->num_rows() > 0){
                                 echo '<option value="">-Select Employee Name-</option>';
                                 foreach ($var->result() as $row){
                                 echo '<option value="'.$row->id.'">'.$row->first_name.'&nbsp;&nbsp;'. $row->mid_name.'&nbsp;&nbsp;'. $row->last_name.'&nbsp;&nbsp;('.$row->username.')</option>';
                                 }}?>
                            </select>
                        </div>
                        <div class="col-md-2">
                             <a href="#" class="btn btn-sm btn-round btn-primary" id="addCourseButton" ><i class="ion-checkmark-round">Assign Class</i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-calendar  exam_panel_body">
                        <div class="panel-heading bg_info border-light">
                          <h5 class="panel-title">Employee Class</h5>
                        </div>
                        <div class="panel-body" id="classEmp">
                        </div>
                      </div>
                    </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      $("#addCourseButton").click(function(){
         var courseId = $("#courseID").val();
        var empUsername = $("#empID").val();
        //alert(courseId);
        //alert(empUsername);
   $.post('<?php echo base_url("configure/addCourseClass")?>', { courseId : courseId,
    empUsername : empUsername }, function(data){
              $("#classEmp").html(data);
        });
        });
         var empUsername = $("#empID").val();
        var courseId = $("#courseID").val();
   $.post('<?php echo base_url("configure/addCourseClass")?>', { empUsername : empUsername,courseId : courseId }, function(data){
              $("#classEmp").html(data);
        });
        // $('#empshowList').DataTable();
       });         
</script>