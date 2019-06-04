<?php
    class Student extends CI_Controller {
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
    	
    	public function promotion() {
    	    $result = $this->db->query("SELECT DISTINCT `course` FROM `student_info` WHERE 1 ORDER BY `course` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Student Promotion',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Student',
    	        "subPage"       => 'Promotion',
    	        "title"         => 'Promotion',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'promotion',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	
    	public function getyear() {
    	    $course = $this->input->post("course");
    	    $result = $this->db->query("SELECT DISTINCT `year` FROM `student_info` WHERE `course` = '$course' ORDER BY `year` ASC;")->result();
    	    $response = Array("response" => $result);
    	    echo json_encode($response);
    	}
    	
    	public function getsubj(){
    	     $course = $this->input->post("course");
    	      $year = $this->input->post("year");
    	    $result = $this->db->query("SELECT DISTINCT `subject_name` FROM `program_subjects` WHERE `program_name` = '$course' and `program_code`='$year' ORDER BY `subject_name` ASC;")->result();
    	    $response = Array("response" => $result);
    	    echo json_encode($response);
    	}
    	
    	public function getstudents() {
    	    $year = $this->input->post("year");
    	    $course = $this->input->post("course");
    	    $result = $this->db->query("SELECT * FROM `student_info` WHERE `course` = '$course' AND `year` = '$year' ORDER BY `sno` ASC;")->result();
    	    $response = Array("result" => $result);
    	    echo json_encode($response);
    	}
    	
    	public function promote() {
    	    
    	    $studentID = $this->uri->segment(3);    	    
    	    $this->db->where("sno", $studentID);
            $stuInfo = $this->db->get("student_info")->row();
            
            if($stuInfo->category == 'GEN' || $stuInfo->category == 'OBC'):
                if($stuInfo->gender == 'MALE'):
                    $categoryID = 1;
                elseif($stuInfo->gender == 'FEMALE'):
                    $categoryID = 2;
                endif;
            else:
                $categoryID = 3;
            endif;
            
            if($stuInfo->year == "1st"){
    	    	$year= 2;
    	    }
    	    elseif($stuInfo->year == "2nd"){
    	        $year = 3;
    	    }
        //    $year = $stuInfo->year == '1st' ? 1 : $stuInfo->year == '2nd' ? 2 : 3;
        //    echo $year;
         ///   die;
            $course = $stuInfo->course;
            $title = $course.'-'.$year;
            
            $course = $this->db->query("SELECT `id` FROM `course` WHERE `title` = '$title'")->row();
            $courseID = $course->id;
            $courseFee = $this->db->query("SELECT * FROM `feeDescription` WHERE `courseID` = $courseID AND `categoryID` = $categoryID")->result();
            
            $sub1 = $stuInfo->subject1;
            $sub2 = $stuInfo->subject2;
            $sub3 = $stuInfo->subject3;
            $course = $stuInfo->course;
            $year1 = $stuInfo->year;
            
            
            if($year1=="1st"){
    	    	$year1="2nd";
    	    }
    	    elseif($year1=="2nd"){
    	        $year1 = "3rd";
    	    }
    	    $queryString = "SELECT `fee_amount` FROM `program_subjects` WHERE `subject_name` IN ('$sub1','$sub2','$sub3') AND `program_code` = '$year1' AND `program_name` = '$course'";
            $result = $this->db->query($queryString)->result();
            
            $data = array(
                "pageTitle"     => 'Student Promotion Detail',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Student',
    	        "subPage"       => 'Promotion',
    	        "title"         => 'Promotion',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'promotionDetail',
    	        "stuInfo"       => $stuInfo,
    	        "courseFee"     => $courseFee,
    	        "result"        => $result,
    	        "st"            => $queryString
            );
            $this->load->view("includes/mainContent", $data);
    	}
    	
    	public function finalpromote() {
    	   
    	    $skip = isset($_POST["skip"]) ? $this->input->post("skip") : "";
    	    $sub1 = isset($_POST["sub1"]) ? $this->input->post("sub1") : "";
    	    $sub2 = isset($_POST["sub2"]) ? $this->input->post("sub2") : "";
    	    $sub3 = isset($_POST["sub3"]) ? $this->input->post("sub3") : "";
    	    $sub1 = $skip == $sub1 ? '' : $sub1;
    	    $sub2 = $skip == $sub2 ? '' : $sub2;
    	    $sub3 = $skip == $sub3 ? '' : $sub3;
    	    
    	    if(isset($_FILES['stuImage']['name'])):
        	    $photo_name = time().trim($_FILES['stuImage']['name']);
        		$this->load->library('upload');
        		// Set configuration array for uploaded photo.
        		$image_path = realpath(APPPATH . '../assets/images/stuImage');
        		$config['upload_path'] = $image_path;
        		$config['allowed_types'] = 'gif|jpg|jpeg|png';
        		$config['max_size'] = '600';
        		$config['file_name'] = $photo_name;
        		// Upload first photo and create a thumbnail of it.
        		if (!empty($_FILES['stuImage']['name'])) {
        			$this->upload->initialize($config);
        			if ($this->upload->do_upload('stuImage')) {
        				// ---------------------------------- Redirect Success Page ----------------------
        				$i = true;
        			}
        			else{
        				echo $this->upload->display_errors();
        			}
        		}
        	endif;
    	    
        	$rollNo = $this->input->post("student_id");
    	    $dataArray["name"] = $this->input->post("patientName");
    	    $dataArray["leaser_no"]="";
    	    $dataArray["father_name"]=$this->input->post("fatherName");
    	    $dataArray["addmissionDate"]=$this->input->post("admissionDate");
    	    $dataArray["dob"]=$this->input->post("dob");
    	    $dataArray["adhaarNo"]=$this->input->post("adhaar");
    	    $dataArray["uRollNo"]=$this->input->post("uRollNo");
    	    $dataArray["subject1"]=$sub1;
    	    $dataArray["subject2"]=$sub2;
        	 
    	    $dataArray["subject3"]=$sub3;
    	    
    	    

    	    $this->db->where("roll_number",$rollNo);
    	    $rty =  $this->db->get("student_info")->row();
    	    
    	    if($rty->year == "1st"):
    	    	$dataArray["year"]="2nd";
    	    elseif($rty->year == "2nd"):
    	    	$dataArray["year"]="3rd";
    	    elseif($rty->year == "3rd"):
    	    	$dataArray["year"]="3rd";
    	    endif;
    	   // print_r($rty);
    	    $queryString = "SELECT `fee_amount` FROM `program_subjects` WHERE `subject_name` = '$skip' AND `program_code` = '".$dataArray["year"]."' AND `program_name` = '".$rty->course."'";
            $result = $this->db->query($queryString);
        	
    	
            if($result->num_rows()>0){
            	$result1=$result->row();
            	$dataArray["fee"] = $this->input->post("addfee") - $result1->fee_amount;
            }
        	else{
        		$dataArray["fee"] = $this->input->post("addfee");
        	}
        	
              //fee add code in opening closing table
            $this->db->where("opening_date",date('Y-m-d'));
            $table = $this->db->get("opening_closing_balance");
          //  print_r($table->result());exit;
            if($table->num_rows()>0){

          $a = $table->row()->closing_balance;
                $close= $a + $this->input->post("addfee");
            $cr_date = date('Y-m-d');
                $balance = array(
                        "closing_balance" => $close,
                        "closing_date" => $cr_date,
                );
                //$this->db->where("school_code",$school_code);
                $this->db->where("opening_date",date("Y-m-d"));
                 $this->db->update('opening_closing_balance',$balance);
             }
         else{
             $clo =  $this->db->query("select * from opening_closing_balance")->row();
            $cl_date = $clo->closing_date;
            $cl_balance = $clo->closing_balance;
            $cr_date = date('Y-m-d');
            if($cl_date != $cr_date)
            {
                $balance = array(
                        "opening_balance" => $cl_balance,
                        "closing_balance" => $cl_balance + $this->input->post("addfee"),
                        "opening_date" => $cr_date,
                        "closing_date" => $cr_date
                        //"school_code"=>$school_code
                );
                $this->db->insert('opening_closing_balance',$balance);
            }

            }
            
            //end code
        	
        	$courseFee = $this->db->query("INSERT INTO `student_info_old` SELECT * FROM `student_info` WHERE `roll_number` = '$rollNo'");
        	
        	if($rty->year == "3rd"):
        	    echo "Not  Eligible for Promotion";
        	else:
        		$this->db->where("roll_number", $rollNo);
        		$this->db->update("student_info", $dataArray);
        	endif;
        	
        	$this->db->where("roll_number", $rollNo);
            $stuInfo = $this->db->get("student_info")->row();
            
            $data = array(
                "pageTitle"     => 'Student Promotion Detail',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Student',
    	        "subPage"       => 'Promotion',
    	        "title"         => 'Promotion',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'printSlip',
    	        "stuInfo"       => $stuInfo
            );
            $this->load->view("includes/mainContent", $data);
    	}
    	
    	function printSlip() {
    	    $rollNo = $this->uri->segment(3);
    	    
    	    $this->db->where("roll_number", $rollNo);
            $stuInfo = $this->db->get("student_info")->row();
            
            $data = array(
                "pageTitle"     => 'Student Promotion Detail',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Student',
    	        "subPage"       => 'Promotion',
    	        "title"         => 'Promotion',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'printSlip',
    	        "stuInfo"       => $stuInfo
            );
            $this->load->view("includes/mainContent", $data);
    	}
    	
    	public function electionStudent() {
    	    $result = $this->db->query("SELECT DISTINCT `course` FROM `search_with_photo` WHERE  1 ORDER BY `course` ASC;")->result();
    	    $data = Array(
    	        "pageTitle"     => 'Election Student',
    	        "smallTitle"    => '',
    	        "mainPage"      => 'Student',
    	        "subPage"       => 'electionStudent',
    	        "title"         => 'electionStudent',
    	        "headerCss"     => 'headerCss/studentListCss',
    	        "footerJs"      => 'footerJs/simpleStudentListJs',
    	        "mainContent"   => 'electionStudent',
    	        "courses"       => $result
    	    );
    		$this->load->view("includes/mainContent", $data);
    	}
    	public function getElectionYears() {
    	    $course = $this->input->post("course");
    	    $result = $this->db->query("SELECT DISTINCT `year` FROM `search_with_photo` WHERE  `course` = '$course' ORDER BY `year` ASC;")->result();
    	    $response = Array("response" => $result);
    	    echo json_encode($response);
    	}
    	
    	
    		public function getElectionStudents() {
    	    $year = $this->input->post("year");
    	  
    	    $start_fsd = $this->session->userdata('fsd');
    	    $course = $this->input->post("course");
    	     $subject = $this->input->post("subject");
    	     if($subject=="as"){
    	         $result = $this->db->query("SELECT * FROM `student_info` WHERE `status` = 1 AND `course` = '$course' AND `year` = '$year' AND (`addmissionDate` > '$start_fsd') ORDER BY `sno` ASC;")->result();
    	     
    	     }else{
    	        $result = $this->db->query("SELECT * FROM `student_info` WHERE `status` = 1 AND `course` = '$course' AND `year` = '$year' AND (`addmissionDate` > '$start_fsd') AND (`subject1`='$subject' OR `subject2`='$subject' OR `subject3`='$subject')  ORDER BY `sno` ASC;")->result();
    	     
    	     }
    	   // $result = $this->db->query("SELECT * FROM `student_info1` WHERE `course` = '$course' AND `year` = '$year' AND (`subject1`='$subject' OR `subject2`='$subject' OR `subject3`='$subject')  ORDER BY `sno` ASC;")->result();
    	    $response = Array("result" => $result);
    	    echo json_encode($response);
    	}
    	
    	
    		public function checkID(){
			$tid = $this->input->post("student_id");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkStudID($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					?>
							<div class="alert alert-success">
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								ID Found ! <strong><?php echo $row->name." ".$row->course." ".$row->year; ?></strong>
							</div>
							<script>

							$("#b1").show();
							</script>
							<?php 
						}}
					else{
						?>
							<div class="alert alert-danger">
						
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								Sorry :( <strong><?php echo "Student ID Not Found ! Wrong Student Id"; ?></strong>
							</div>
							<script>
								$("#b1").hide();
								</script>
						<?php
						
					}
				
			}
			
		
			public function getSearchWithPhoto() {
    	    $year = $this->input->post("year");
    	    $course = $this->input->post("course");
    	   
    	     $result = $this->db->query("SELECT * FROM `search_with_photo` WHERE `course` = '$course' AND `year` = '$year' ORDER BY `sno` ASC;")->result();
    	   
    	   
    	   // $result = $this->db->query("SELECT * FROM `student_info1` WHERE `course` = '$course' AND `year` = '$year' AND (`subject1`='$subject' OR `subject2`='$subject' OR `subject3`='$subject')  ORDER BY `sno` ASC;")->result();
    	    $response = Array("result" => $result);
    	    echo json_encode($response);
    	}
    	


        public function updatestatus() {

         $status = $this->input->post('status');
        $this->db->where('roll_number',$status);
      $studentid=$this->db->get('student_info')->row()->status;
      if($studentid == 1){
        $data= array("status" => 0);
        print_r($data);
        $this->db->where('roll_number',$status);
        $this->db->update("student_info",$data);

    }else{
        $data= array("status" => 1);
         $this->db->where('roll_number',$status);
        $this->db->update("student_info",$data);
    }
       //print_r($studentid);
          /* $data= array(
"status" => 0
           )
        $this->db->update("student_info",$data);*/
           
        }
			
			
    }
    
?>