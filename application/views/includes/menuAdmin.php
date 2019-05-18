<!-- start: PAGESLIDE LEFT -->
<a class="closedbar inner hidden-sm hidden-xs" href="#">
</a>
<nav id="pageslide-left" class="pageslide inner">
<div class="navbar-content">
<!-- start: SIDEBAR -->
<div class="main-navigation left-wrapper transition-left">
<div class="navigation-toggler hidden-sm hidden-xs">
    <a href="#main-navbar" class="sb-toggle-left">
    </a>
</div>
<div >
    <div class="inline-block">
    	<?php if(strlen($this->session->userdata('photo')) > 1):?>
    		<?php if($this->session->userdata('login_type') == 'student'): ?>
        		<img src="<?php echo base_url()?>assets/images/stuImage/<?php $this->session->userdata('photo');?>" width="30" alt="">
        	<?php else: ?>
        		<img src="<?php echo base_url()?>assets/images/empImage/<?php echo $this->session->userdata('photo');?>" width="30" alt="">
        	<?php endif;?>
        <?php else:?>
        	<img src="<?php echo base_url()?>assets/images/anonymous.jpg" width="30" alt="">
        <?php endif;?>
    </div>
    <div class="inline-block">
        <h5 class="no-margin"> Welcome </h5>
        <h4 class="no-margin"> <?php echo $this->session->userdata('name'); ?> </h4>
        <a class="btn user-options sb_toggle">
            <i class="fa fa-cog"></i>
        </a>
    </div>
</div>
<!-- start: MAIN NAVIGATION MENU -->

<!-- ===================================================== Administrator Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'admin'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span> </a>
</li>

<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Configuration </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>configure/course">
                <span class="title">Course</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url(); ?>configure/category">
                <span class="title">Category</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>configure/feeHeads">
                <span class="title">Fee Heads</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>configure/setfee">
                <span class="title">Set Fee</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>configure/feeEntry">
                <span class="title">Fee Entry</span>
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Students </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/newAdmission1">
                <span class="title">New Admission</span>
            </a>
        </li>
        <li>
            <a href="<?= base_url(); ?>student/promotion">
                <span class="title">Promotion</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/updateStudent">
                <span class="title">Update Student</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/login/search">
                <span class="title">Simple Search </span>
            </a>
        </li> <li>
            <a href="<?php echo base_url(); ?>index.php/login/searchByCourse">
                <span class="title">Subject wise List </span>
            </a>
        </li>
      <!--  <li>
            <a href="<?php echo base_url(); ?>index.php/login/simpleSearchStudent">
                <span class="title">Search with photo</span>
            </a>
        </li>-->
        <li>
            <a href="<?= base_url(); ?>student/electionStudent">
                <span class="title">Search with photo</span>
            </a>
        </li>
       
       <li>
            <a href="<?php echo base_url(); ?>index.php/login/collectFee">
                <span class="title">Collect Fee</span>
            </a>
        </li>
         
    </ul>
</li>


<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Students Cards </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/libraryCard/generateLibraryCard">
                <span class="title">Library Card</span>
            </a>
        </li>
      
         
    </ul>
</li>

   
 
   
   




       <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Mobile Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
   				
        		<li>
		            <a href="<?php echo base_url(); ?>index.php/login/mobileNotice/Notice">
		                Notice(Individual)<i class="icon-arrow"></i>
		            </a>
                </li>
             
               
              
               
            </ul>
 </li>
 <li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Accounting </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>login/dayBook">
               Day Book<i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>login/cashPayment">
              Transaction <i class="icon-arrow"></i>
            </a>
           
            </li>
      </ul>
    </li>
    
	
	
</ul>
<?php endif;?>

<!-- ===================================================== Administrator Menu End ======================================= -->
<!-- ===================================================== Student Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'student'): ?>


<?php endif; ?>
<!-- ===================================================== Student Menu End ======================================= -->

<!-- ===================================================== Accountent Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'accountent'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">HOME</span> </a>
</li>

<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Configuration </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
       
        <li>
            <a href="<?php echo base_url(); ?>configure/updateData">
                <span class="title">Update Data</span>
            </a>
        </li>
    </ul>
</li>


	
	
</ul>
<?php endif;?>
<!-- ===================================================== Accountent Menu End ======================================= -->

<!-- ===================================================== Employee Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'employee'): ?>
<ul class="main-navigation-menu">
	 <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/viewProfile">
                <span class="title"> View Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/salarySummry">
                <span class="title">Salary Summry </span>
            </a>
        </li>
       
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/TeacherLeave">
                <span class="title"> Leave Detail </span>
            </a>
        </li>
   </ul>     
	
	
	

<?php endif; ?>
<!-- ===================================================== Employee Menu End ======================================= -->

<!-- ===================================================== Teacher Menu Start ======================================= -->
<?php if($this->session->userdata('login_type') == 'teacher'): ?>

<ul class="main-navigation-menu">
<li class="active open">
    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-home"></i> <span class="title"> Dashboard </span><span class="label label-default pull-right ">LABEL</span> </a>
</li>

<li>
    <a href="javascript:void(0)"><i class="fa fa-cogs"></i> <span class="title"> Personal </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
         <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/viewProfile">
                <span class="title"> View Profile </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/salarySummry">
                <span class="title">Salary Summry </span>
            </a>
        </li>
       
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/TeacherLeave">
                <span class="title"> Leave Detail </span>
            </a>
        </li>
      
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="title"> Class </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/classTaken">
                <span class="title">Classes Taken</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/marksEntry">
                <span class="title">Marks Entry</span>
            </a>
        </li>
       
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i> <span class="title">Fee </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/feeReport">
                <span class="title">Fee Report</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="title"> Attendance </span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherStudentAttendance">
                <span class="title">Student Attendance </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherStuAttendanceReport">
                <span class="title"> Attendance Report </span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-code"></i> <span class="title">Time Scheduling</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
       
     
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherClasstimeTable">
                <span class="title">Class Time Table</span>
            </a>
        </li>
         <li>
            <a href="<?php echo base_url(); ?>index.php/login/defineLessonPlan">
                <span class="title">Define Lesson Plan</span>
            </a>
        </li>
          <li>
            <a href="<?php echo base_url(); ?>index.php/login/viewLessonPlan">
                <span class="title">Lesson Plan Report</span>
            </a>
        </li>
        
    </ul>
</li>
<li>
    <a href="javascript:void(0)"><i class="fa fa-cubes"></i> <span class="title">Exam</span><i class="icon-arrow"></i> </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherExamDuty">
                <span class="title">Exam Duty</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherTimeTable">
                <span class="title">Exam Time Table </span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherExamDetail">
                <span class="title">Exam Details</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherResults">
                <span class="title">Results</span>
            </a>
        </li>
       
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> HomeWork </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/studentHWControllers/defineHomeWork">
                Define HomeWork <i class="icon-arrow"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/studentHWControllers/showHomeWork">
              	Show HomeWork <i class="icon-arrow"></i>
            </a>
        </li>
      
    </ul>
</li>
<li>
    <a href="javascript:;" class="active">
        <i class="fa fa-folder"></i> <span class="title"> Stock </span> <i class="icon-arrow"></i>
    </a>
    <ul class="sub-menu">
       
        </li>
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherStockDetail">
               Stock Report
            </a>
        </li>
      
    </ul>
</li>
<li>
    <a href="javascript:;">
        <i class="fa fa-folder-open"></i> <span class="title"> Message </span><i class="icon-arrow"></i> <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherNoticeAlert">
                Notice / Alert <i class="icon-arrow"></i>
            </a>
           
                </li>
                <li>
            <a href="<?php echo base_url(); ?>index.php/singleTeacherControllers/teacherMessage">
               Message <i class="icon-arrow"></i>
            </a>
           
                </li>
               
            </ul>
        </li>
</ul>
<?php endif;?>
<!-- ===================================================== Teacher Menu End ======================================= -->

<!-- end: MAIN NAVIGATION MENU -->
</div>
<!-- end: SIDEBAR -->
</div>
<div class="slide-tools">
    <div class="col-xs-6 text-left no-padding">
        <a class="btn btn-sm status" href="#">
            Status <i class="fa fa-dot-circle-o text-green"></i> <span>Online</span>
        </a>
    </div>
    <div class="col-xs-6 text-right no-padding">
        <a class="btn btn-sm log-out text-right" href="<?php echo base_url()?>index.php/homeController/logout">
            <i class="fa fa-power-off"></i> Log Out
        </a>
    </div>
</div>
</nav>
<!-- end: PAGESLIDE LEFT -->