<?php
    class Configure extends CI_Controller {
     function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("teacherModel");
                $this->load->model("allFormModel");
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}
    	public function course() {
    	    $result = $this->db->query("SELECT * FROM `course` WHERE 1 ORDER BY `title` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Course Configuration',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Configure',
    	        "subPage"       => 'Course',
    	        "title"         => 'Course Configuration',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/course',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function saveCourse() {
    	    $courseTitle = $this->input->post("course-input");
    	    $year = $this->input->post("year");
    	    $course = $courseTitle . '-' . $year;
    	    $insertData = array("title" => $course);
    	    
    	    $this->db->insert('course', $insertData);
    	    redirect(base_url()."configure/course");
    	}
    	
    	public function category() {
    	    $result = $this->db->query("SELECT * FROM `category` WHERE 1 ORDER BY `title` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Configure Category',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Configure',
    	        "subPage"       => 'Category',
    	        "title"         => 'Configure Category',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/category',
    	        "category"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function saveCategory() {
    	    $title = $this->input->post("category");
    	    $insertData = array("title" => $title);
    	    
    	    $this->db->insert('category', $insertData);
    	    redirect(base_url()."configure/category");
    	}
    	
    	public function feeHeads() {
    	    $result = $this->db->query("SELECT * FROM `feeHead` WHERE 1 ORDER BY `title` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Configure Fee Heads',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Configure',
    	        "subPage"       => 'Fee Heads',
    	        "title"         => 'Configure Fee Heads',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/feeheads',
    	        "category"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function saveFeeheads() {
    	    $title = $this->input->post("feehaeds");
    	    $insertData = array("title" => $title);
    	    
    	    $this->db->insert('feeHead', $insertData);
    	    redirect(base_url()."configure/feeHeads");
    	}
    	
    	public function setfee() {
    	    $result = $this->db->query("SELECT * FROM `course` WHERE 1 ORDER BY `id` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Set Fee',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Cofigure',
    	        "subPage"       => 'Set Fee',
    	        "title"         => 'Set Fee',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/setfee',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function updateData(){
    	    if($this->session->userdata('login_type') == 'admin'){
    	    
    	     $result = $this->db->query("SELECT * FROM `course` WHERE 1 ORDER BY `id` ASC;")->result();
    	    }else{
    	       $empno = $this->session->userdata('username');
    	       if($empno =='20021'){
    	           $result = $this->db->query("SELECT * FROM `course` WHERE  `title` = 'BA-1' OR `title` = 'BA-2' OR `title` = 'BA-3';")->result();
    	       }
    	       if($empno =='20022'){
    	           $result = $this->db->query("SELECT * FROM `course` WHERE  `title` = 'B.Sc. BIO-1' OR `title` = 'B.Sc. BIO-2' OR `title` = 'B.Sc. BIO-3' OR `title` = 'B.Sc. MATH-1' OR `title` = 'B.Sc. MATH-2' OR `title` = 'B.Sc. MATH-3';")->result();
    	       }
    	        if($empno =='20023'){
    	           $result = $this->db->query("SELECT * FROM `course` WHERE  `title` = 'MA-1' OR `title` = 'MA-2' OR `title` = 'MA (G)-1' OR `title` = '	
MA (G)-2' OR `title` = 'MA (G OTHER)-1' OR `title` = 'MA (G OTHER)-2'  OR `title` = 'MA (OTHER)-1'  OR `title` = 'MA (OTHER)-2';")->result();
    	       }
    	    }
    	    $data = Array(
    	        "pageTitle"     => 'Set Data',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Cofigure',
    	        "subPage"       => 'Update Student',
    	        "title"         => 'Update Student',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/updateStudent',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function getFeeDetails() {
    	    $courseID = $this->input->post('courseID');
    	    $feeHead = $this->db->query("SELECT * FROM `feeHead` WHERE `id` IN (SELECT DISTINCT `feeHeadID` FROM `feeDescription` WHERE `courseID` = $courseID)")->result();
    	    $category = $this->db->query("SELECT * FROM `category` WHERE `id` IN (SELECT DISTINCT `categoryID` FROM `feeDescription` WHERE `courseID` = $courseID)")->result();
    	    $result = $this->db->query("SELECT * FROM `feeDescription` WHERE `feeDescription`.`courseID` = $courseID;")->result();
    	    
    	    $data = array(
    	        "feeHead" => $feeHead,
    	        "category" => $category,
    	        "result" => $result
    	    );
    	    echo json_encode($data);
    	}
    	
    	public function getStuDetails() {
    	    $courseID = $this->input->post('courseID');
    	    $feeHead = $this->db->query("SELECT * FROM `student_info` WHERE  `course` = '$courseID'")->result();
    	    
    	    $data = array(
    	        "feeHead" => $feeHead
    	    );
    	    echo json_encode($data);
    	}
    	
    	public function setStuDetails() {
    	    $sno = $this->input->post("sno");
    	    $dataArray = array(
    	        "adhaarNo" => $this->input->post("adhaarNo"),
                "leaser_no" => $this->input->post("leaser_no"),
                "reciept_no" => $this->input->post("reciept_no"),
                "book_no" => $this->input->post("book_no")
            );
            $this->db->where('sno', $sno);
            $this->db->update('student_info', $dataArray);
            
            echo json_encode(array("success" => true));
    	}
    	
    	public function updateFeeDetails() {
    	    $feeAmount1 = $this->input->post("feeAmount1");
            $feeID1 = $this->input->post("feeID1");
            $feeAmount2 = $this->input->post("feeAmount2");
            $feeID2 = $this->input->post("feeID2");
            $feeAmount3 = $this->input->post("feeAmount3");
            $feeID3 = $this->input->post("feeID3");
            
            $this->db->query("UPDATE `feeDescription` SET `amount` = $feeAmount1 WHERE `id` = $feeID1");
            $this->db->query("UPDATE `feeDescription` SET `amount` = $feeAmount2 WHERE `id` = $feeID2");
            $this->db->query("UPDATE `feeDescription` SET `amount` = $feeAmount3 WHERE `id` = $feeID3");
            
            echo 'Fee updated successfully';
    	}
    	
    	public function feeEntry() {
    	    $result = $this->db->query("SELECT * FROM `course` WHERE 1 ORDER BY `id` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Fee Entry',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Cofigure',
    	        "subPage"       => 'Fee Entry',
    	        "title"         => 'Fee Entry',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'configure/newfee',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function getCategory() {
    	    $category = $this->db->query("SELECT * FROM `category`;")->result();
    	    echo json_encode(array("category" => $category));
    	}
    	
    	public function getFeeHeads() {
    	    $courseID = $this->input->post('courseID');
    	    $categoryID = $this->input->post('categoryID');
    	    $feeCatHead = $this->db->query("SELECT `feeHeadID` FROM `feeDescription` WHERE `courseID` = $courseID AND `categoryID` = $categoryID;")->result();
    	    $feeHead = $this->db->query("SELECT * FROM `feeHead`;")->result();
    	    echo json_encode(array("feeCatHead" => $feeCatHead, "feeHead" => $feeHead));
    	}
    	
    	public function saveFeeAmount() {
    	    $course = $this->input->post('course');
    	    $category = $this->input->post('category');
    	    $FeeHead = $this->input->post('id');
    	    $amount = $this->input->post('amount');
    	    
    	    $i = 0;
    	    foreach($amount as $val):
    	        $data = array(
        	        "feeHeadID" => $FeeHead[$i],
                    "courseID" => $course,
                    "categoryID" => $category,
                    "amount" => $val
        	    );
        	    $i++;
        	    
        	   $this->db->insert('feeDescription', $data);
    	    endforeach;
    	    redirect(base_url()."configure/feeEntry");
    	}
        public function assinAccount() {
           //$result = $this->db->query("SELECT * FROM `course` WHERE 1 ORDER BY `id` ASC;")->result();
            $data = Array(
                "pageTitle"     => 'Assign Class to Accountent',
                "smallTitle"    => '',
                "mainPage"      => 'Cofigure',
                "subPage"       => 'Assign Class to Accountent',
                "title"         => 'Assign Class to Accountent',
                "headerCss"     => 'headerCss/studentListCss',
                "footerJs"      => 'footerJs/simpleStudentListJs',
                "mainContent"   => 'configure/assignAcc',
               // "courses"       => $result
            );
            $this->load->view("includes/mainContent", $data);
        }
        public function addCourseClass(){
        $empUser=$this->input->post('empUsername');
        $course = $this->input->post('courseId');
        
        $this->load->model('empClassModel');
        if(strlen($empUser)>1){
        $empList = $this->empClassModel->addcourseAcc($empUser,$course);
    }else{
        $empList = $this->empClassModel->addscourseAcc();
    }
        $data['empList'] = $empList;
        $this->load->view("configure/assignClass",$data);
    }
    public function updateCourse(){
        $this->load->model('empClassModel');
        if($query = $this->empClassModel->updateCourseModel($this->input->post("empId"),$this->input->post("empuname"))){
            ?>
            <script>
                    $.post("<?php echo base_url('configure/addCourseClass') ?>", function(data){
                        $("#classEmp").html(data);
                    });
            </script>
            <?php 
        }
    }
    public function deleteCourse(){
        $this->load->model('empClassModel');
        if($query = $this->empClassModel->deleteCourseModel($this->input->post("empId"))){
            ?>
            <script>
                    $.post("<?php echo base_url('configure/addCourseClass') ?>", function(data){
                        $("#classEmp").html(data);
                    });
            </script>
            <?php 
        }
    }
        ///course add
       
    }
?>