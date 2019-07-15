		
		
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
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
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-elements.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-validation.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
	
    jQuery(document).ready(function() {

       
         $("#programm_name").change(function(){
            var programm_name = $("#programm_name").val();
          
            $.post("<?php echo site_url('index.php/newAdmissionController/showSubject') ?>", {programm_name : programm_name}, function(data){
                $("#sub1").html(data);
                 $("#sub2").html(data);
                  $("#sub3").html(data);
                //alert(data);
    		});
        });
        $("#cate1").change(function(){
          
        	  var cate1 = $("#cate1").val();
        	  var gender = $("#gen").val();
              var subject3 = $("#sub3").val();
              var subject2 = $("#sub2").val();
              var subject1 = $("#sub1").val();
              var year = $("#yr").val();
              if(year.length > 0){
              if(gender.length > 0){
              if(subject1.length > 0){
                  if(subject2.length<1){
                	  subject2=subject1;}
                  if(subject3.length<1){
                	  subject3=subject1;}
                 
                  
                  var programm_name = $("#programm_name").val();
                  $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                      $("#showFee").val(data);
                      //alert(data);
          		});
            	  
              }else{
                  alert("Select atleast one Subject");
              }
              }
              else{
            	  alert("Select Gender first.");
              }
              }else{
            	  alert("Select Year of student first.");
              }
	        });
        $("#sub3").change(function(){
            
      	  var cate1 = $("#cate1").val();
      	  if((cate1.length > 0)&&(year.length >0)){
      	  var gender = $("#gen").val();
            var subject3 = $("#sub3").val();
            var subject2 = $("#sub2").val();
            var subject1 = $("#sub1").val();
            var year = $("#yr").val();
      	  
            if(year.length > 0){
                if(gender.length > 0){
                if(subject1.length > 0){
                    if(subject2.length<1){
                  	  subject2=subject1;}
                    if(subject3.length<1){
                  	  subject3=subject1;}
                   
                    
                    var programm_name = $("#programm_name").val();
                    $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                        $("#showFee").val(data);
                        //alert(data);
            		});
              	  
                }else{
                    alert("Select atleast one Subject");
                }
                }
                else{
              	  alert("Select Gender first.");
                }
                }else{
              	  alert("Select Year of student first.");
                }
      	  }
  	        });
        $("#sub2").change(function(){
            
        	  var cate1 = $("#cate1").val();
        	  if((cate1.length > 0)&&(year.length >0)){
        	  var gender = $("#gen").val();
              var subject3 = $("#sub3").val();
              var subject2 = $("#sub2").val();
              var subject1 = $("#sub1").val();
              var year = $("#yr").val();
              if(year.length > 0){
                  if(gender.length > 0){
                  if(subject1.length > 0){
                      if(subject2.length<1){
                    	  subject2=subject1;}
                      if(subject3.length<1){
                    	  subject3=subject1;}
                     
                      
                      var programm_name = $("#programm_name").val();
                      $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                          $("#showFee").val(data);
                          //alert(data);
              		});
                	  
                  }else{
                      alert("Select atleast one Subject");
                  }
                  }
                  else{
                	  alert("Select Gender first.");
                  }
                  }else{
                	  alert("Select Year of student first.");
                  }
    	       
        	  }
  	        });
        $("#sub1").change(function(){
            
      	  var cate1 = $("#cate1").val();
      	  if((cate1.length > 0)&&(year.length >0)){
      	  var gender = $("#gen").val();
            var subject3 = $("#sub3").val();
            var subject2 = $("#sub2").val();
            var subject1 = $("#sub1").val();
            var year = $("#yr").val();
            if(year.length > 0){
                if(gender.length > 0){
                if(subject1.length > 0){
                    if(subject2.length<1){
                  	  subject2=subject1;}
                    if(subject3.length<1){
                  	  subject3=subject1;}
                   
                    
                    var programm_name = $("#programm_name").val();
                    $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                        $("#showFee").val(data);
                        //alert(data);
            		});
              	  
                }else{
                    alert("Select atleast one Subject");
                }
                }
                else{
              	  alert("Select Gender first.");
                }
                }else{
              	  alert("Select Year of student first.");
                }
      	  }
  	        });
        $("#yr").change(function(){
            
        	  var cate1 = $("#cate1").val();
        	  if((cate1.length > 0)&&(year.length >0)){
        	  var gender = $("#gen").val();
              var subject3 = $("#sub3").val();
              var subject2 = $("#sub2").val();
              var subject1 = $("#sub1").val();
              var year = $("#yr").val();
              if(year.length > 0){
                  if(gender.length > 0){
                  if(subject1.length > 0){
                      if(subject2.length<1){
                    	  subject2=subject1;}
                      if(subject3.length<1){
                    	  subject3=subject1;}
                     
                      
                      var programm_name = $("#programm_name").val();
                      $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                          $("#showFee").val(data);
                          //alert(data);
              		});
                	  
                  }else{
                      alert("Select atleast one Subject");
                  }
                  }
                  else{
                	  alert("Select Gender first.");
                  }
                  }else{
                	  alert("Select Year of student first.");
                  }
        	  }
    	        });
        $("#gen").change(function(){
            
        	  var cate1 = $("#cate1").val();
        	  if((cate1.length > 0)&&(year.length >0)){
        	  var gender = $("#gen").val();
              var subject3 = $("#sub3").val();
              var subject2 = $("#sub2").val();
              var subject1 = $("#sub1").val();
              var year = $("#yr").val();
        	  
              if(year.length > 0){
                  if(gender.length > 0){
                  if(subject1.length > 0){
                      if(subject2.length<1){
                    	  subject2=subject1;}
                      if(subject3.length<1){
                    	  subject3=subject1;}
                     
                      
                      var programm_name = $("#programm_name").val();
                      $.post("<?php echo site_url('index.php/newAdmissionController/calculate_fee') ?>", {programm_name : programm_name, subject3 : subject3,year : year,gender : gender, subject1 : subject1, subject2 : subject2,cate1 : cate1}, function(data){
                          $("#showFee").val(data);
                          //alert(data);
              		});
                	  
                  }else{
                      alert("Select atleast one Subject");
                  }
                  }
                  else{
                	  alert("Select Gender first.");
                  }
                  }else{
                	  alert("Select Year of student first.");
                  }
        	  }
    	        });
        Main.init();
        SVExamples.init();
        
    });
</script>