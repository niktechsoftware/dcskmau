<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootbox/bootbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.scrollTo/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/ScrollToFixed/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.appear/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/velocity/jquery.velocity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/TouchSwipe/jquery.touchSwipe.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mockjax/jquery.mockjax.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/truncate/jquery.truncate.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/summernote/dist/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview.js"></script>
<script src="<?php echo base_url(); ?>assets/js/subview-examples.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/lib/d3.v3.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/nv.d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/historicalBarChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedArea.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nvd3/src/models/stackedAreaChart.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/index.js"></script>
<script scr="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CORE JAVASCRIPTS  -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script scr="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- end: CORE JAVASCRIPTS  -->
<script>
    jQuery(document).ready(function() {
    		
    		// $("#tranDetailButton").click(function(){
		    //     var sessionID = $('#session_nm').val();
		    //     var start_date = $('#st_date').val();
		    //     var end_date = $('#end_date').val();
      //      		 var radioValue = $("input[name='check_list']:checked").val();
      //      		 var radioDebit = $("input[name= 'value1']:checked").val();
		    //  		alert(sessionID);
		    //  		alert(start_date);
		    //  		alert(end_date);
		    //  		alert(radioValue);
		    //  		alert(radioDebit);
		    //     $.post("<?php //echo base_url('daybookController/daybook') ?>",{
		    //  		sessionID : sessionID,
		    //  		start_date : start_date,
		    //  		end_date : end_date,
		    //  		 radioValue : radioValue,
		    //  			radioDebit : radioDebit}, function(data){
		    //             $("<?php //echo base_url('daybookController/daybook') ?>").html(data);
		    //            alert(data);
		    //     });
		    //    // $('#addExam').val("");
		    //     });

				    $('#showdayList').DataTable();
				
        Main.init();
        SVExamples.init();
        Index.init();
    });
</script>